<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSettingsRequest;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Laracasts\Flash\Flash;

class UsersController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
    }

    /**
     *Dashboard of an user
     */
    public function index()
    {
        return view('pages.users.dashboard')->with('user', Auth::user());
    }

    /**
     * public profile of an user
     * @param $username
     * @return $this
     */
    public function show($slug)
    {
        $user = $this->userRepository->getBySlug($slug);
        return view('pages.users.profile')->with('user', $user);
    }

    /**
     *Page for edit an user
     */
    public function edit()
    {
        return view('pages.users.preferences')->with('user', Auth::user());
    }

    /**
     * update of a user
     * @param UserSettingsRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UserSettingsRequest $request)
    {
        $this->userRepository->update(Auth::user()->id, $request->all());

        Flash::success(Lang::get('user.update-success'));

        return redirect(action('UsersController@edit'));

    }

    /**
     * List of carpoolings of an user
     */
    public function carpoolings()
    {
        return view('pages.users.carpoolings')->with('carpoolings', Auth::user()->carpoolings()->get());
    }

    /**
     *  List of events of an user
     */
    public function events()
    {
        return view('pages.users.events')->with('events', Auth::user()->events()->get());
    }

}