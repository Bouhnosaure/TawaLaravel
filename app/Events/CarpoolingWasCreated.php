<?php namespace App\Events;

use App\Carpooling;
use App\Events\Event;

use App\User;
use Illuminate\Queue\SerializesModels;

class CarpoolingWasCreated extends Event
{

    use SerializesModels;
    /**
     * @var User
     */
    private $user;
    /**
     * @var Carpooling
     */
    private $carpooling;


    /**
     * Create a new event instance for Carpooling creation.
     *
     * @param User $user
     * @param Carpooling $carpooling
     */
    public function __construct(User $user, Carpooling $carpooling)
    {
        //
        $this->user = $user;
        $this->carpooling = $carpooling;
    }

}
