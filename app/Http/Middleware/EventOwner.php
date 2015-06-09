<?php namespace App\Http\Middleware;

use App\Repositories\EventRepositoryInterface;
use Closure;
use Illuminate\Auth\Guard;
use Illuminate\Support\Facades\Route;

class EventOwner
{
    /**
     * @var Guard
     */
    private $auth;
    /**
     * @var EventRepositoryInterface
     */
    private $eventRepository;

    /**
     * @param Guard $auth
     * @param EventRepositoryInterface $eventRepository
     */
    public function __construct(Guard $auth, EventRepositoryInterface $eventRepository)
    {
        $this->auth = $auth;
        $this->eventRepository = $eventRepository;
    }

    /**
     * Handle an incoming request for authorize an user to access to his events
     * based on action parameters to get the identifier
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $event_id_or_slug = array_values(Route::getCurrentRoute()->parameters())[0];

        $event = $this->eventRepository->getBySlug($event_id_or_slug);

        $owner = $event->user_id == $this->auth->user()->id;

        //or admin
        if ($owner) {
            return $next($request);
        }

        return redirect(action('PagesController@index'));
    }
}
