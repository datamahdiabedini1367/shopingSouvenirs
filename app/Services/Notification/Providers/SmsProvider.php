<?php

namespace App\Services\Notification\Providers;

use App\Models\User;
use App\Services\Notification\Exceptions\UserDoesNotHaveMobileNumber;
use App\Services\Notification\Exceptions\UserDoesNotHavePhoneNumber;
use App\Services\Notification\Providers\Contracts\Provider;
use GuzzleHttp\Client;
use Kavenegar\KavenegarApi;

class SmsProvider implements Provider
{
    private $user;
    private $text;

    public function __construct(User $user, string $text)
    {
        $this->user = $user;
        $this->text = $text;

    }

    public function send()
    {
        $this->havePhoneNumber();


        $client = new Client();

        $response = $client->request('GET', config('services.sms.uri'),
            [
                'query' => [
                    'receptor' => $this->user->mobile,
                    'message' => $this->text,
                    'sender' => config('services.sms.from'),
                ]
            ]
        );

        $this->isErrorWhenSendSms($response);


        $response = $response->getBody()->getContents();
        return $response;


    }

    private function prepareDataForSms()
    {
        return [
            'receptor' => $this->user->phone_number,
            'message' => $this->text,
            'sender' => config('services.sms.from')
        ];

    }

    private function havePhoneNumber()
    {
        if (is_null($this->user->mobile)) {
            throw new UserDoesNotHaveMobileNumber("User does not have Mobile number.");
        }
    }

    private function isErrorWhenSendSms($status)
    {

    }


}
