<?php

namespace App\Providers;

use App\Events\OrderRegistered;
use App\Events\UserRegistered;
use App\Listeners\SendOrderDetail;
use App\Listeners\SendVerificationEmail;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        UserRegistered::class => [
            SendVerificationEmail::class
        ],

        OrderRegistered::class => [
            SendOrderDetail::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
