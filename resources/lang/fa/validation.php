<?php


return [
    'integer' => ':attribute باید به صورت عددی باشد.',
//    'exists' => ':attribute داخل سیستم وجود ندارد.',
    'exists' => 'نام کاربری یا رمز عبور اشتباه است',
    'string' => ':attribute باید به صورت صحیح وارد شود.',
    'required' => ':attribute الزامی میباشد.',
    'required_if' => ' :attribute الزامی میباشد. ',
    'email' => ':attribute باید به صورت ایمیل باشد.',
    'unique' => ':attribute تکراری میباشد.',
    'confirmed' => ':attribute مطابقت ندارد.',
    'max' => [
        'string' => ':attribute حداکثر باید :max کاراکتر باشد.',
        'integer' => ':attribute باید حداکثر :max عدد باشد.'
    ],
    'min' => [
        'string' => ':attribute باید حداقل :min کاراکتر باشد.',
        'integer' => ':attribut  باید حداقل  :min باشد.'
    ],
    'digits' => ':attribute باید :digits رقم باشد.',
    'numeric' => ':attribute باید به صورت عددی باشد.',


    'attributes' => [
        'email_type' => 'نوع ایمیل',
        'user' => 'کاربر',
        'text' => 'متن پیام کوتاه',
        'firstname' => 'نام',
        'lastname' => 'نام خانوادگی',
        'email' => 'ایمیل',
        'mobile' => 'موبایل',
        'password_confirmation' => 'تایید کلمه عبور',
        'password' => 'کلمه عبور',
        'token' => 'توکن',
        'code' => 'کد',
        'persian_name' => 'نام فارسی',
        'method' => 'روش پرداخت',
        'gateway' => 'درگاه پرداخت',
        'name' => 'نام کالا',
        'price' => 'قیمت کالا',
        'stock' => 'موجودی کالا',
        'percent' => 'درصد تخفیف',

    ],

    'The :attribute must contain at least one uppercase and one lowercase letter' => '',
    'The :attribute must contain at least one letter' => '',
    'The :attribute must contain at least one symbol' => '',
    'The :attribute must contain at least one number' => '',
];
