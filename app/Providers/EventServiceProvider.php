<?php

namespace App\Providers;

use App\Events\OrderCreated;
use App\Events\OrderUpdating;
use App\Events\PackageChanged;
use App\Listeners\BaselinkerOrderUpdate;
use App\Listeners\StripeCustomerUpdate;
use App\Listeners\StripeEventListener;
use App\Listeners\SyncPackageStatus;
use Faker\Provider\Base;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Laravel\Cashier\Events\WebhookReceived;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        PackageChanged::class => [
            SyncPackageStatus::class
        ],
        OrderCreated::class => [
            StripeCustomerUpdate::class
        ],
        WebhookReceived::class => [
            StripeEventListener::class,
        ],
        OrderUpdating::class => [
            BaselinkerOrderUpdate::class
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
