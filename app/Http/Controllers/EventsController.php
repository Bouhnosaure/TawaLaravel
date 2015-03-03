<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Event;
use App\Http\Requests\CreateEventRequest;
use Illuminate\Http\Response;

class EventsController extends Controller
{

    /**
     * Show All Events
     *
     * @return Response
     */
    public function index()
    {

        $events = Event::latest('created_at')->NotFinished()->paginate(3);

        return view('pages.events.index')->with('events', $events);

    }

    /**
     * Show One Event
     *
     * @return Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);

        return view('pages.events.show')->with('event', $event);
    }

    /**
     * Show Event Form
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.events.create');
    }

    /**
     * Handle Form Post Request to store an event
     *
     * @param CreateEventRequest $request
     * @return Response
     */
    public function store(CreateEventRequest $request)
    {
        $input = Request::all();
        Event::create($input);

        return redirect('events');
    }


}
