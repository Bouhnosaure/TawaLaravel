<?php namespace App\Providers;

use App\Events\CarpoolingWasCreated;
use App\Events\EventWasCreated;
use App\Listeners\SendCarpoolingCreationConfirmation;
use App\Listeners\SendEventCreationConfirmation;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{

    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        EventWasCreated::class => [
            SendEventCreationConfirmation::class,
        ],
        CarpoolingWasCreated::class => [
            SendCarpoolingCreationConfirmation::class,
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }

}
