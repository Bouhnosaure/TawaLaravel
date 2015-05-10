<?php namespace App\Handlers\Commands;


use App\Commands\SendConfirmationCode;
use App\Repositories\UserConfirmationRepositoryInterface;
use App\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

class SendConfirmationCodeHandler
{
    /**
     * @var UserConfirmationRepositoryInterface
     */
    private $userConfirmation;

    /**
     * Create the command handler.
     *
     * @param UserConfirmationRepositoryInterface $userConfirmation
     */
    public function __construct(UserConfirmationRepositoryInterface $userConfirmation)
    {
        $this->userConfirmation = $userConfirmation;
    }

    /**
     * Handle the command.
     *
     * @param    $command
     * @return void
     */
    public function handle(SendConfirmationCode $command)
    {
        switch ($command->getType()) {
            case 'mail':
                $this->sendMail($command->getUser(), $command->getType());
                break;
            case 'phone':
                $this->sendSms($command->getUser(), $command->getType());
                break;
        }
    }

    public function sendMail(User $user, $type)
    {
        $code = $this->generateCode($user, $type);

        Mail::send('emails.confirmation-code', ['user' => $user, 'code' => $code], function ($message) use ($user) {
            $message->to($user->email, $user->name);
            $message->subject('Confirmation Code');
        });


    }

    public function sendSms(User $user, $type)
    {
        $code = $this->generateCode($user, $type);

        //SMS GATEWAY IMPLEMENTATION
        if (Config::get('confirmation.phone_debug')) {
            Mail::send('emails.confirmation-debug-sms', ['user' => $user, 'code' => $code], function ($message) use ($user) {
                $message->to($user->email, $user->name);
                $message->subject('Confirmation Code');
            });
        }
    }

    public function generateCode(User $user, $type)
    {
        return $this->userConfirmation->create($user, $type);
    }

}
