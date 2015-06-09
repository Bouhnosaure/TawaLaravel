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
