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
        return $this->carpoolingRepository->create($user, $data, $this->extractStopovers($data));
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function edit($id, array $data)
    {
        return $this->carpoolingRepository->update($id, $data, $this->extractStopovers($data));
    }

    /**
     * Extracts stopovers and order them from an array request data
     * @param array $data
     * @return array
     */
    public function extractStopovers(array $data)
    {
        $i = 0;
        $stopovers = array();
        $stopovers[] = new Stopover(['location' => trim($data['location']), 'carpooling_order' => 0]);

        if ($data['stopovers'] != "") {
            $stopovers_raw = explode("|", $data['stopovers']);
            foreach ($stopovers_raw as $stopover) {
                ++$i;
                $stopovers[] = new Stopover(['location' => trim($stopover), 'carpooling_order' => $i]);
            }
        }
        ++$i;
        $event = $this->eventRepository->getById($data['event_id']);
        $stopovers[] = new Stopover(['location' => trim($event->location), 'carpooling_order' => $i]);

        return $stopovers;
    }

}