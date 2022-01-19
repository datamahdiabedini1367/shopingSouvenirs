<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Support\Payment\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    private $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    public function verify(Request $request)
    {
        $order =$this->transaction->verify() ;

        Auth::login($order->user);

        return $order
            ? $this->sendSuccessResponse($order)
            : $this->sendErrorResponse();
    }

    private function sendErrorResponse()
    {
        return redirect()->route('home')->with('error', 'مشکلی در هنگام ثبت سفارش بوجود آمده است');
    }

    private function sendSuccessResponse(Order $order)
    {

//        return redirect()->route('home')->with('success', "سفارش شما با موفقیت انجام شد.");
//        return $order;


        return redirect()->route('home')->with('success_payment', __('payment.your order has been registered', [
            'orderNum' => $order->id,
        ]));
    }


}
