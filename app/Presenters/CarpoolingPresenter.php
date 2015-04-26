<?php namespace App\Presenters;


use App\Carpooling;
use McCool\LaravelAutoPresenter\BasePresenter;

class CarpoolingPresenter extends BasePresenter
{
    public function __construct(Carpooling $resource)
    {
        $this->wrappedObject = $resource;
    }


    /**
     * get departure of a carpooling
     * @return mixed
     */
    public function departure()
    {
        $stopovers = $this->wrappedObject->stopovers();
        return $stopovers->getQuery()->orderBy('carpooling_order', 'ASC')->get()->first()['location'];
    }

    /**
     * get arrival of a carpooling
     * @return mixed
     */
    public function arrival()
    {
        $stopovers = $this->wrappedObject->stopovers();
        return $stopovers->getQuery()->orderBy('carpooling_order', 'DESC')->get()->first()['location'];
    }

    /**
     * Get all stopovers between departure and arrival
     * @return null|string
     */
    public function stopovers_between()
    {
        $list = null;
        $stopovers = $this->wrappedObject->stopovers();
        $stopovers = $stopovers->getQuery()->orderBy('carpooling_order', 'ASC')->get()->toArray();

        if (sizeof($stopovers) > 2) {

            array_shift($stopovers);
            array_pop($stopovers);

            foreach ($stopovers as $stopover) {
                if ($stopover == end($stopovers)) {
                    $list .= $stopover['location'];
                } else {
                    $list .= $stopover['location'] . '|';
                }
            }
        }

        return $list;
    }

}