<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Event;
use App\Http\Requests\EventRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Show All Events
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $events = Event::latest('created_at')->NotFinished()->paginate(15);
        return view('pages.events.index')->with('events', $events);
    }

    /**
     * Show One Event
     * Model biding in Providers/RouteServiceProvider
     * Instead of $event = Event::findOrFail($id);
     *
     * @param Event $event
     * @return \Illuminate\View\View
     */
    public function show(Event $event)
    {
        return view('pages.events.show')->with('event', $event);
    }

    /**
     * Show Event Form
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pages.events.create');
    }

    /**
     * Handle Form Post Request to store an event
     *
     * @param EventRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(EventRequest $request)
    {
        Auth::user()->events()->create($request->all());
        return redirect('events');
    }

    /**
     *  Show edit Form to edit an event
     *
     * @param Event $event
     * @return \Illuminate\View\View
     */
    public function edit(Event $event)
    {
        return view('pages.events.edit')->with('event', $event);
    }

    /**
     * Handles update of an event
     *
     * @param Event $event
     * @param EventRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Event $event, EventRequest $request)
    {
        $event->update($request->all());
        return redirect('events');
    }


}
