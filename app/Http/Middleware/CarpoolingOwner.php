<?php namespace App\Http\Middleware;

use App\Repositories\CarpoolingRepositoryInterface;
use Closure;
use Illuminate\Auth\Guard;
use Illuminate\Support\Facades\Route;

class CarpoolingOwner
{
    /**
     * @var Guard
     */
    private $auth;
    /**
     * @var CarpoolingRepositoryInterface
     */
    private $carpoolingRepository;


    /**
     * @param Guard $auth
     * @param CarpoolingRepositoryInterface $carpoolingRepository
     */
    public function __construct(Guard $auth, CarpoolingRepositoryInterface $carpoolingRepository)
    {
        $this->auth = $auth;
        $this->carpoolingRepository = $carpoolingRepository;
    }

    /**
     * Handle an incoming request for authorize an user to access to his carpoolings
     * based on action parameters to get the identifier
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $carpooling_id = array_values(Route::getCurrentRoute()->parameters())[0];

        $carpooling = $this->carpoolingRepository->getById($carpooling_id);

        $owner = $carpooling->user_id == $this->auth->user()->id;

        //or admin
        if ($owner) {
            return $next($request);
        }

        return redirect(action('PagesController@index'));

    }

}
