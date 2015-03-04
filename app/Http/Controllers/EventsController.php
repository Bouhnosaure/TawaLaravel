<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Event;
use App\Http\Requests\EventRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EventsController extends Controller
{

    /**
     * Show All Events
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $events = Event::latest('created_at')->NotFinished()->paginate(3);
        return view('pages.events.index')->with('events', $events);
    }

    /**
     * Show One Event
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
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
        Event::create($request->all());
        return redirect('events');
    }

    /**
     *  Show edit Form to edit an event
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('pages.events.edit')->with('event', $event);
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
        $event = Event::findOrFail($id);
        $event->update($request->all());
        return redirect('events');
    }


}
