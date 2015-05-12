<?php namespace App\Services;

use App\Carpooling;
use App\Event;
use App\Repositories\CarpoolingRepositoryInterface;
use App\Repositories\EventRepositoryInterface;
use App\Stopover;
use App\User;
use Illuminate\Support\Facades\Auth;

class CarpoolingService
{
    /**
     * @var stopovers
     */
    private $stopovers = array();

    /**
     * @var position
     */
    private $position = 0;

    /**
     * @var CarpoolingRepositoryInterface
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
        $this->carpoolingRepository = $carpoolingRepository;
        $this->eventRepository = $eventRepository;
    }

    /**
     * handles creation process for carpooling
     *
     * @param User $user
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function create(User $user, array $data)
    {
        return $this->carpoolingRepository->create($user, $data, $this->processData($data));
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function edit($id, array $data)
    {
        return $this->carpoolingRepository->update($id, $data, $this->processData($data));
    }

    /**
     * prepare and return an array of stopovers
     * @param array $data
     * @return array
     */
    public function processData(array $data)
    {
        $this->extractDeparture($data);
        $this->extractStopovers($data);
        $this->extractArrival($data);
        return $this->stopovers;
    }

    /**
     * Add departure stopover
     * @param array $data
     */
    public function extractDeparture(array $data)
    {
        $this->addStopover($data['location'], 0);
    }

    /**
     * Add last stopover
     * @param array $data
     */
    public function extractArrival(array $data)
    {
        $this->position++;
        $event = $this->eventRepository->getById($data['event_id']);
        $this->addStopover($event->location);
    }

    /**
     * Extracts stopovers and order them from an array request data
     * @param array $data
     * @return array
     */
    public function extractStopovers(array $data)
    {
        if ($data['stopovers'] != "") {
            $stopovers_raw = explode("|", $data['stopovers']);
            foreach ($stopovers_raw as $stopover) {
                $this->addStopover($stopover, ++$this->position);
            }
        }
    }

    /**
     * add a simple stopover project
     * @param $location
     */
    public function addStopover($location)
    {
        $this->stopovers[] = new Stopover(['location' => trim($location), 'carpooling_order' => $this->position]);
    }

    /**
     * @return array
     */
    public function getStopovers()
    {
        return $this->stopovers;
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

}