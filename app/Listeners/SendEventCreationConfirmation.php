<?php namespace App\Listeners;

use App\Events\EventWasCreated;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEventCreationConfirmation implements ShouldQueue
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
     * Handle the event of sending a mail after the creation of an event or festival
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
