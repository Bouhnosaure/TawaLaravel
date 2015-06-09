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

    /**
     * Get username
     * @return mixed
     */
    public function getUserName()
    {
        return $this->user->name;
    }

    /**
     * get user email
     * @return mixed
     */
    public function getUserEmail()
    {
        return $this->user->email;
    }

    /**
     * get name of the event
     * @return mixed
     */
    public function getEventName()
    {
        return $this->event->name;
    }
}
