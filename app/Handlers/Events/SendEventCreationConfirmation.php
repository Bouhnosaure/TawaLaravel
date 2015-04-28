<?php namespace App\Handlers\Events;

use App\Events\EventWasCreated;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Illuminate\Support\Facades\Mail;

class SendEventCreationConfirmation implements ShouldBeQueued
{

    use InteractsWithQueue;

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
     * @param  EventWasCreated $event
     * @return void
     */
    public function handle(EventWasCreated $event)
    {

        Mail::later(5, 'emails.event-created', ['user' => $event->getUserName(), 'event' => $event->getEventName()], function ($message) use ($event) {
            $message->to($event->getUserEmail(), $event->getUserName());
            $message->subject('EventCreate');
        });


    }

}
