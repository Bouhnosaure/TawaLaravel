<?php namespace App\Http\Controllers;

use App\Carpooling;
use App\Event;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CarpoolingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the carpooling.
     *
     * @param Event $event
     * @return Response
     */
    public function index()
    {
        $carpoolings = Carpooling::latest('created_at')->NotStarted()->paginate(15);

        return view('pages.carpoolings.index')->with('carpoolings', $carpoolings);
    }

    /**
     * Show the form for creating a new carpooling.
     *
     * @param Event $event
     * @return Response
     */
    public function create()
    {
        $events = Event::latest('created_at')->NotFinished()->lists('name','id');
        return view('pages.carpoolings.create')->with('events', $events);
    }

    /**
     * Store a newly created carpooling in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified carpooling.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified carpooling.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified carpooling in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified carpooling from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
