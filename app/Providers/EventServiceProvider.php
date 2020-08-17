<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\Addfile;
use App\Listeners\AddfileListener;
use App\Events\NewEnquery;
use App\Listeners\NewEnqueryListener;
use App\Events\PasswordResetEvent;
use App\Listeners\PasswordResetEventListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Addfile::class => [
            AddfileListener::class,
        ],
        NewEnquery::class => [
            NewEnqueryListener::class,
        ],
        PasswordResetEvent::class => [
            PasswordResetEventListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
