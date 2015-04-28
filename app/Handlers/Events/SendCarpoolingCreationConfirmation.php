<?php namespace App\Handlers\Events;

use App\Events\CarpoolingWasCreated;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

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
        //
    }

}
