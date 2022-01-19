<?php

namespace App\Services\Notification;

use App\Services\Notification\Providers\Contracts\Provider;
use Illuminate\Mail\Mailable;


/**
 * @method sendSms(\App\Models\User $user, string $text)
 * @method sendEmail(\App\Models\User $user, \Illuminate\Mail\Mailable $mailable)
 */
class Notification
{
    public function __call($methodName, $arguments)
    {
        $providerPath = __NAMESPACE__ .'\\Providers\\'.substr($methodName , 4).'Provider';
        if (!class_exists($providerPath)){
            throw new \Exception("class dose not Exist");
        }
        $providerInstance = new $providerPath(...$arguments);

        if (!is_subclass_of($providerInstance , Provider::class)) {
            throw new \Exception("class must implements \App\Services\Notification\Providers\Contracts\Provider");
        }
        $providerInstance->send();

    }


}
