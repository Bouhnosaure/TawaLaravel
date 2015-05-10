<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 09/05/2015
 * Time: 23:05
 */

namespace App\Http\Controllers\Auth;


use App\Commands\SendConfirmationCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConfirmationRequest;
use App\Repositories\UserConfirmationRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Laracasts\Flash\Flash;

class ConfirmationController extends Controller
{

    /**
     * @var UserConfirmationRepositoryInterface
     */
    private $confirmationRepository;

    /**
     * @param UserConfirmationRepositoryInterface $confirmationRepository
     */
    public function __construct(UserConfirmationRepositoryInterface $confirmationRepository)
    {
        $this->middleware('auth');
        $this->confirmationRepository = $confirmationRepository;
    }

    /**
     * displays the list of the user confirmations
     * @return $this
     */
    public function index()
    {
        $user = Auth::user();
        return view('pages.confirmation.index')->with('user', $user);
    }

    /**
     * handles the sending of the differents types of confirmations
     * @param $type
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function send($type)
    {
        if ($type == "mail" && Config::get('confirmation.mail')) {

            $this->dispatch(new SendConfirmationCode(Auth::user(), $type));
            Flash::success(Lang::get('confirmation.send-mail-success'));
            return redirect('confirmation');
        }

        if ($type == "phone" && Config::get('confirmation.phone') && isset(Auth::user()->phone)) {

            $this->dispatch(new SendConfirmationCode(Auth::user(), $type));
            Flash::success(Lang::get('confirmation.send-phone-success'));
            return redirect('confirmation/phone');
        }

        Flash::error(Lang::get('confirmation.send-failed'));
        return redirect('confirmation');
    }

    /**
     * shows the form for enter the 4 digit code for the phone
     */
    public function submitPhoneCode()
    {
        return view('pages.confirmation.phone-confirmation');
    }

    /**
     * handle post method for the 4 digit code confirmation for the phone
     * @param ConfirmationRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handlePhoneCode(ConfirmationRequest $request)
    {
        $confirmation = $this->confirmationRepository->getByConfirmationCode($request->get('code'));

        $ok = $confirmation->user_id == Auth::user()->id;

        //and delete

        if ($ok) {
            Flash::success(Lang::get('confirmation.success'));
        } else {
            Flash::error(Lang::get('confirmation.failed'));
        }


        return redirect('confirmation');
    }

    /**
     * Receive the token for authorize an user
     * @param $code
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function confirmMailCode($code)
    {

        if ($code == 'azerty') {
            Flash::success(Lang::get('confirmation.success'));
        } else {
            Flash::error(Lang::get('confirmation.failed'));
        }
        return redirect('confirmation');
    }

}