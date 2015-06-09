<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\ImageRequest;
use App\Http\Requests\UserProfileRequest;
use App\Repositories\UserRepositoryInterface;
use App\Services\ImageService;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Intervention\Image\Facades\Image;
use Laracasts\Flash\Flash;
use Spatie\Glide\GlideImage;

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

    /**
     * Handles the process of upload images
     * @param ImageRequest $request
     * @param ImageService $imageService
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function upload(ImageRequest $request, ImageService $imageService)
    {
        if ($request->hasFile('image')) {
            $filename = $imageService->processTo('users/', $request);

            $data['profile']['image_'.$request->get('image_type')] = $filename;
            $this->userRepository->update(Auth::user()->id, $data);
        }

        return redirect(action('ProfileController@edit'));
    }
}
