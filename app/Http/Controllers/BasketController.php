<?php

namespace App\Http\Controllers;

use App\Exceptions\QuantityExceededException;
use App\Models\Product;
use App\Support\Basket\Basket;
use App\Support\Payment\Transaction;
use App\Support\Storage\Contracts\StorageInterface;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    private $basket;

    private $transaction;

    public function __construct(Basket $basket, Transaction $transaction)
    {
        $this->middleware('auth')->only(['checkoutForm', 'checkout']);
        $this->basket = $basket;
        $this->transaction = $transaction;
    }

    public function add(Product $product)
    {
        try {
            $this->basket->add($product, 1);

            return back()->with('success', __('payment.added to basket'));
        } catch (QuantityExceededException $exception) {
            return back()->with('error', __('payment.quantity exceeded'));
        }
    }

    public function index()
    {
        $items = $this->basket->all();
        return view('basket', compact('items'));
    }

    public function clear()
    {
        resolve(StorageInterface::class)->clear();
    }

    public function update(Request $request, Product $product)
    {
        $this->basket->update($product, $request->quantity);
        return back();
    }

    public function checkoutForm()
    {
        return view('checkout');
    }

    public function checkout(Request $request)
    {
        $this->validateFrom($request);


        $order = $this->transaction->checkout();

        return redirect()->route('home')->with('success_payment', __('payment.your order has been registered', [
            'orderNum' => $order->id,
        ]));

    }

    public function validateFrom(Request $request)
    {
        $request->validate([
            "method" => ['required'],
            "gateway" => ['required_if:method,online'],
        ]);

    }

}
