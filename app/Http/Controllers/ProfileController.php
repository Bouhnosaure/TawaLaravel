<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\UserProfileRequest;
use App\Http\Requests\UserSettingsRequest;
use App\Repositories\UserProfileRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Laracasts\Flash\Flash;

class ProfileController extends Controller
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
     * Show the profile of an user lambda by slug
     *
     * @param $slug
     * @return Response
     */
    public function show($slug)
    {
        $user = $this->userRepository->getBySlug($slug);

        return view('pages.profile.show')->with('user', $user);
    }

    /**
     * Show the form for editing the profile of the authenticated user
     *
     * @return Response
     */
    public function edit()
    {
        $user = $this->userRepository->getById(Auth::user()->id);

        return view('pages.profile.edit')->with('user', $user);
    }

    /**
     * Update the profile of the authenticated user
     *
     * @param UserProfileRequest $request
     * @return Response
     */
    public function update(UserProfileRequest $request)
    {

        $this->userRepository->update(Auth::user()->id, $request->all());

        Flash::success(Lang::get('profile.update-success'));

        return redirect(action('ProfileController@edit'));

    }

}
