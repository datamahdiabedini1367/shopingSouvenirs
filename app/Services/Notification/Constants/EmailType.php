<?php

namespace App\Services\Notification\Constants;

use App\Mail\ForgetPassword;
use App\Mail\OrderCreated;
use App\Mail\UserRegistered;

class EmailType{
    const USER_REGISTERED = 1;
    const ORDER_CREATED = 2;
    const FORGET_PASSWORD = 3;

    public static function toString()
    {
        return [
            static::USER_REGISTERED =>'ثبت نام کاربر',
            static::ORDER_CREATED =>'ایجاد سفارش جدید',
            static::FORGET_PASSWORD =>'فراموشی رمز عبور',
            ];
    }

    public static function toMail($type)
    {
        try {
            return [
                static::USER_REGISTERED => UserRegistered::class,
                static::ORDER_CREATED => OrderCreated::class,
                static::FORGET_PASSWORD => ForgetPassword::class,
            ][$type];
        }catch (\Throwable $th){
            throw new \InvalidArgumentException('Mailable class does not exist.');
        }



    }

}
