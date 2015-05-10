<?php namespace App\Commands;

use App\Repositories\UserConfirmationRepositoryInterface;
use App\User;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendConfirmationCode extends Command implements ShouldBeQueued
{

    use InteractsWithQueue, SerializesModels;

    /**
     * @var User
     */
    private $user;
    /**
     * @var
     */
    private $type;

    /**
     * Create a new command instance.
     *
     * @param User $user
     * @param $type
     */
    public function __construct(User $user, $type)
    {
        $this->user = $user;
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getUser()
    {
        return $this->user;
    }

}
