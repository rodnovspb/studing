<?php

namespace App\Providers;

use App\Events\GoodDeleted;
use App\Events\OrderEvent;
use App\Listeners\DeleteGoodListener;
use App\Listeners\RequestListener;
use App\Listeners\TelegramListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Http\Client\Events\RequestSending;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        OrderEvent::class => [
            TelegramListener::class,
        ],

        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        RequestSending::class => [
            RequestListener::class
        ],
        GoodDeleted::class => [DeleteGoodListener::class],
        Good1Deleted::class => [DeleteGoodListener1::class],
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

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
