<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Event;
use Illuminate\Support\Str;
use Request;

class EventsController extends Controller
{

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
        Event::create($input);

        return redirect('events');
    }


}
