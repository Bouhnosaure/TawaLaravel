<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

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
        $this->middleware('auth', ['except' => ['show']]);
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
     */
    public function update()
    {

    }

    /**
     * List of carpoolings of an user
     */
    public function carpoolings()
    {

    }

    /**
     *  List of events of an user
     */
    public function events()
    {

    }

}