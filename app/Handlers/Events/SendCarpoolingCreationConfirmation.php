<?php namespace App\Handlers\Events;

use App\Events\CarpoolingWasCreated;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Illuminate\Support\Facades\Mail;

class SendCarpoolingCreationConfirmation
{

    /**
     * Create the event handler.
     *
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CarpoolingWasCreated $event
     * @return void
     */
    public function handle(CarpoolingWasCreated $event)
    {
        Mail::later(5, 'emails.carpooling-created', ['user' => $event->getUserName(), 'event' => $event->getEventName()], function ($message) use ($event) {
            $message->to($event->getUserEmail(), $event->getUserName());
            $message->subject('CarpoolingCreate');
        });
    }

}
