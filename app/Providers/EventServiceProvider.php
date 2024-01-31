<?php

namespace App\Providers;

use App\Listeners\CalculationWinnerPointsListener;
use App\Listeners\CountOfRecordHandler;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Listeners\RecordUserOnMatchEventHandler;
use App\Listeners\ChooseMatchWinnerListener;
use App\Events\RecordUserOnMatchEvent;
use App\Events\MatchFinishEvent;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        RecordUserOnMatchEvent::class => [
            RecordUserOnMatchEventHandler::class,
            CountOfRecordHandler::class
        ],
        MatchFinishEvent::class => [
            ChooseMatchWinnerListener::class,
            CalculationWinnerPointsListener::class,
        ]

    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
