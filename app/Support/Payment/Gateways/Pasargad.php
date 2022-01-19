<?php


namespace App\Support\Payment\Gateways;


use App\Models\Order;
use Illuminate\Http\Request;

class Pasargad implements GatewayInterface
{

    private $merchantID;
    private $callback;

    public function __construct()
    {
        $this->merchantID = config('services.gateway.pasargad.merchant_id');
        $this->callback = route('payment.verify' , $this->getName());
    }

    public function pay(Order $order,int $amount)
    {
        dd('pasargad pay');
    }

    public function verify(Request $request)
    {
        dd('pasargad verify');
    }

    public function getName(): string
    {
        return 'pasargad';
    }
}
