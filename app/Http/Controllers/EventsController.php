<?php namespace App\Http\Controllers;

use App\Category;

use App\Events\EventWasCreated;
use App\Http\Requests;
use App\Http\Requests\EventRequest;
use App\Repositories\EventRepositoryInterface;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event as EventTrigger;
use Illuminate\Support\Facades\Lang;
use Laracasts\Flash\Flash;

class EventsController extends Controller
{
    /**
     * @var EventRepository
     */
    private $eventRepository;


    /**
     * @param EventRepositoryInterface $eventRepository
     */
    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('event.owner', ['only' => ['edit', 'update', 'destroy']]);

        $this->eventRepository = $eventRepository;
    }

    /**
     * Show All Events
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $events = $this->eventRepository->paginate(15);

        return view('pages.events.index')->with('events', $events);
    }

    /**
     * Show One Event
     *
     * @param $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $event = $this->eventRepository->getBySlug($slug);

        return view('pages.events.show')->with('event', $event);
    }

    /**
     * Show Event Form
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all()->lists('name', 'id');
        return view('pages.events.create')->with('categories', $categories);
    }

    /**
     * Handle Form Post Request to store an event
     *
     * @param EventRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(EventRequest $request)
    {

        $event = $this->eventRepository->create(Auth::user(), $request->all());

        Flash::success(Lang::get('events.create-success'));

        EventTrigger::fire(new EventWasCreated(Auth::user(), $event));

        return redirect('events');
    }

    /**
     *  Show edit Form to edit an event
     *
     * @param $slug
     * @return \Illuminate\View\View
     */
    public function edit($slug)
    {
        $event = $this->eventRepository->getBySlug($slug);

        $categories = Category::all()->lists('name', 'id');

        return view('pages.events.edit')->with(['event' => $event, 'categories' => $categories]);
    }

    /**
     * Handles update of an event
     *
     * @param $id
     * @param EventRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, EventRequest $request)
    {
        $this->eventRepository->update($id, $request->all());

        Flash::success(Lang::get('events.update-success'));

        return redirect(action('EventsController@show', $id));
    }

    /**
     * Remove the specified event from storage.
     *
     * @param $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->eventRepository->delete($id);

        Flash::success(Lang::get('events.delete-success'));

        return redirect(action('EventsController@index'));
    }


}
