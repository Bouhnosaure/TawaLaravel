<?php namespace App\Events;

use App\Events\Event;

use App\User;
use Illuminate\Queue\SerializesModels;

class EventWasCreated extends Event
{

    use SerializesModels;
    /**
     * @var User
     */
    private $user;
    /**
     * @var \App\Event
     */
    private $event;

    /**
     * Create a new event instance for event creation.
     *
     * @param User $user
     * @param \App\Event $event
     */
    public function __construct(User $user, \App\Event $event)
    {
        //
        $this->user = $user;
        $this->event = $event;
    }

    public function getUserName()
    {
        return $this->user->name;
    }

    public function getUserEmail()
    {
        return $this->user->email;
    }

    public function getEventName()
    {
        return $this->event->name;
    }

}
