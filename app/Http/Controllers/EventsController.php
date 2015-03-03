<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Event;
use Request;

class EventsController extends Controller {

	public function index()
    {

        $events = Event::all();

        return view('pages.events.index')->with('events', $events);

    }

    public function show($id)
    {
        $event = Event::findOrFail($id);

        return view('pages.events.show')->with('event', $event);
    }

    public function create()
    {

        return view('pages.events.create');
    }

    public function store()
    {
        $input = Request::all();

        $event = new Event;
        $event->user_id = 1;
        $event->name =  Request::get('name');
        $event->slug =  Request::get('name').'1';
        $event->description =  Request::get('description');
        $event->start_time =  Request::get('start_time');
        $event->end_time =  Request::get('end_time');
        $event->save();

        return redirect('events');
    }

















































}
