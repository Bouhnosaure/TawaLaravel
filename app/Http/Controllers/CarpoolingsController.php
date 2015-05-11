<?php namespace App\Http\Controllers;

use App\Carpooling;
use App\Event;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CarpoolingRequest;
use App\Repositories\CarpoolingRepositoryInterface;
use App\Repositories\EventRepositoryInterface;
use App\Services\CarpoolingService;
use App\Stopover;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Laracasts\Flash\Flash;

class CarpoolingsController extends Controller
{
    /**
     * @var CarpoolingRepository
     */
    private $carpoolingRepository;
    /**
     * @var EventRepositoryInterface
     */
    private $eventRepository;


    /**
     * @param CarpoolingRepositoryInterface $carpoolingRepository
     * @param EventRepositoryInterface $eventRepository
     */
    public function __construct(CarpoolingRepositoryInterface $carpoolingRepository, EventRepositoryInterface $eventRepository)
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('carpooling.owner', ['only' => ['edit', 'update', 'destroy']]);

        $this->carpoolingRepository = $carpoolingRepository;
        $this->eventRepository = $eventRepository;
    }

    /**
     * Display a listing of the carpooling.
     * @return Response
     * @internal param Event $event
     */
    public function index()
    {
        $carpoolings = $this->carpoolingRepository->paginate(15);

        return view('pages.carpoolings.index')->with('carpoolings', $carpoolings);
    }

    /**
     * Show the form for creating a new carpooling.
     * @return Response
     * @internal param Event $event
     */
    public function create()
    {
        $events = $this->eventRepository->getList();
        return view('pages.carpoolings.create')->with('events', $events);
    }

    /**
     * Store a newly created carpooling in storage.
     *
     * @param CarpoolingRequest $request
     * @param CarpoolingService $service
     * @return Response
     */
    public function store(CarpoolingRequest $request, CarpoolingService $service)
    {
        $service->create(Auth::user(), $request->all());

        Flash::success(Lang::get('carpoolings.create-success'));

        return redirect('carpoolings');
    }

    /**
     * Display the specified carpooling.
     *
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        $carpooling = $this->carpoolingRepository->getById($id);
        return view('pages.carpoolings.show')->with('carpooling', $carpooling);
    }

    /**
     * Show the form for editing the specified carpooling.
     *
     * @param $id
     * @return Response
     */
    public function edit($id)
    {
        $carpooling = $this->carpoolingRepository->getById($id);
        return view('pages.carpoolings.edit')->with('carpooling', $carpooling);
    }

    /**
     * Update the specified carpooling in storage.
     *
     * @param $id
     * @param CarpoolingRequest $request
     * @param CarpoolingService $service
     * @return Response
     */
    public function update($id, CarpoolingRequest $request, CarpoolingService $service)
    {
        $carpooling = $service->edit($id, $request->all());

        Flash::success(Lang::get('carpoolings.create-success'));

        return redirect(action('CarpoolingsController@show', $carpooling->toArray()));
    }

    /**
     * Remove the specified carpooling from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->carpoolingRepository->delete($id);

        Flash::success(Lang::get('carpoolings.delete-success'));

        return redirect(action('CarpoolingsController@index'));
    }

}
