<?php

namespace App\Support\Payment;


use App\Events\OrderRegistered;
use App\Models\Order;
use App\Models\Payment;
use App\Support\Basket\Basket;
use App\Support\Cost\Contracts\CostInterface;
use App\Support\Payment\Gateways\GatewayInterface;
use App\Support\Payment\Gateways\Pasargad;
use App\Support\Payment\Gateways\Saman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Transaction
{
    private $request;
    private $basket;
    private $cost;

    public function __construct(Request $request, Basket $basket , CostInterface $cost)
    {
        $this->request = $request;
        $this->basket = $basket;
        $this->cost = $cost;
    }

    private function makeOrder()
    {
        $order = Order::query()->create([
            'user_id' => auth()->user()->id,
            'code' => bin2hex(Str::random(16)),
            'amount' => $this->basket->subTotal(),
            'status' => Order::REGISTERING,
        ]);

        $order->products()->attach($this->products());

        return $order;
    }

    public function products()
    {
        $products = [];
        foreach ($this->basket->all() as $item) {
            $products[$item->id] = ['quantity' => $item->quantity];
        }
        return $products;
    }

    private function makePayment(Order $order)
    {
        return Payment::query()->create([
            'order_id' => $order->id,
            'method' => $this->request->get('method'),
            'amount' => $this->cost->getTotalCost(),
        ]);
    }

    private function gatewayFactory()
    {
        $gateway = [
            'saman' => Saman::class,
            'pasargad' => Pasargad::class,
        ][$this->request->gateway];

        return resolve($gateway);
    }

    public function checkout()
    {
        DB::beginTransaction();
        try {
            $order = $this->makeOrder();

            $payment = $this->makePayment($order);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return null;
        }

        if ($payment->isOnline()) {

            return $this->gatewayFactory()->pay($order,$this->cost->getTotalCost());
        }

        return $this->completeOrder($order);

    }

    public function verify()
    {
        $result = $this->gatewayFactory()->verify($this->request);


        if ($result['status'] === GatewayInterface::TRANSACTION_FAILED)
            return false;


        $this->confirmPayment($result);

        return $this->completeOrder($result['order']);

    }

    private function completeOrder(Order $order)
    {
        $this->normalizeQuantity($order);

        event(new OrderRegistered($order));

        $this->basket->clear();

        session()->forget('coupon');


//        $this->user->coupons()->last();

        return $order;
    }

    private function confirmPayment($result)
    {
        $result['order']->payment->confirm($result['RefNum'], $result['gateway']);
        $result['order']->changeStatus();
    }

    private function normalizeQuantity($order)
    {
        foreach ($order->products as $product) {
            $product->decrementStock($product->pivot->quantity);
        }
    }

}
