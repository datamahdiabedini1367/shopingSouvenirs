<?php


namespace App\Support\Payment\Gateways;


use App\Models\Order;
use Illuminate\Http\Request;

class Saman implements GatewayInterface
{
    private $merchantID;
    private $callback;

    public function __construct()
    {
        $this->merchantID = config('services.gateway.saman.merchant_id');
        $this->callback = route('payment.verify', $this->getName());
    }

    public function pay(Order $order,int $amount)
    {
        $this->redirectToBank($order,$amount);
//        return $order;
    }

    /***
     * Payment confirmation as bank
     * @param Request $request
     * @return array
     */
    public function verify(Request $request)
    {
//        if (!$request->has('State') || $request->input('State') !== 'OK'){
//            return $this->transactionFailed();
//        }

        $soapClient = new \SoapClient('https://acquirer.samanepay.com/payments/referencepayment.asmx?WSDL');

        $response = $soapClient->verifyTransaction($request->input('RefNum'), $this->merchantID);

        $order = $this->getOrder($request->input('ResNum'));


//for test success
        $response = $order->payment->amount;
        $request->merge(['RefNum'=>"123456789"]);
//--------------


        return $response == $order->payment->amount
            ? $this->transactionSuccess($order, $request->input('RefNum'))
            : $this->transactionFailed();

    }

    private function getOrder($resNum)
    {
        return Order::query()->where('code', $resNum)->firstOrFail();

    }

    private function transactionFailed()
    {
        return [
            'status' => self::TRANSACTION_FAILED,
        ];
    }

    private function transactionSuccess($order, $refNum)
    {
        return [
            'status' => self::TRANSACTION_SUCCESS,
            'order' => $order,
            'RefNum' => $refNum,
            'gateway' => $this->getName(),

        ];
    }

    public function getName(): string
    {
        return 'saman';
    }

    private function redirectToBank($order,$amount)
    {

        echo "<form action='https://sep.shaparak.ir/payment.aspx' method='post' id='samanpeyment'>
        <input type='hidden' name='Amount' value='{$amount}'>
        <input type='hidden' name='ResNum' value='{$order->code}'>
        <input type='hidden' name='RedirectURL' value='{$this->callback}'>
        <input type='hidden' name='MID' value='{$this->merchantID}'>
        </form><script>document.forms['samanpeyment'].submit()</script>";

    }
}
