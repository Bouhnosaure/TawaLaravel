<?php namespace App\Http\Controllers;

use App\Carpooling;
use App\Event;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CarpoolingRequest;
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
     * @return Response
     * @internal param Event $event
     */
    public function create()
    {
        $events = Event::latest('created_at')->NotFinished()->lists('name', 'id');
        return view('pages.carpoolings.create')->with('events', $events);
    }

    /**
     * Store a newly created carpooling in storage.
     *
     * @param CarpoolingRequest $request
     * @return Response
     */
    public function store(CarpoolingRequest $request)
    {
        dd($request->all());
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
