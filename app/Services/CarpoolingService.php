<?php namespace App\Services;

use App\Carpooling;
use App\Event;
use App\Stopover;
use App\User;
use Illuminate\Support\Facades\Auth;

class CarpoolingService
{

    /**
     * handles creation process for carpooling
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function create(array $data)
    {
        $carpooling = Auth::user()->carpoolings()->create($data);
        $carpooling->stopovers()->saveMany($this->extractStopovers($data));
        return $carpooling;
    }

    /**
     * @param Carpooling $carpooling
     * @param array $data
     * @return mixed
     */
    public function edit(Carpooling $carpooling, array $data)
    {
        $carpooling->update($data);
        $carpooling->stopovers()->delete();
        $carpooling->stopovers()->saveMany($this->extractStopovers($data));
        return $carpooling;
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
        $stopovers[] = new Stopover(['location' => $data['location'], 'carpooling_order' => 0]);

        if ($data['stopovers'] != "") {
            $stopovers_raw = explode(",", $data['stopovers']);
            foreach ($stopovers_raw as $stopover) {
                ++$i;
                $stopovers[] = new Stopover(['location' => $stopover, 'carpooling_order' => $i]);
            }
        }
        ++$i;
        $event = Event::findOrFail($data['event_id']);
        $stopovers[] = new Stopover(['location' => $event->location, 'carpooling_order' => $i]);

        return $stopovers;
    }

}