<?php namespace App\Presenters;


use App\Carpooling;
use McCool\LaravelAutoPresenter\BasePresenter;

class CarpoolingPresenter extends BasePresenter
{
    public function __construct(Carpooling $resource)
    {
        $this->wrappedObject = $resource;
    }


    public function departure()
    {
        $stopovers = $this->wrappedObject->stopovers();
        return $stopovers->getQuery()->orderBy('carpooling_order', 'ASC')->get()->first()['location'];
    }

    public function arrival()
    {
        $stopovers = $this->wrappedObject->stopovers();
        return $stopovers->getQuery()->orderBy('carpooling_order', 'DESC')->get()->first()['location'];
    }

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
                    $list .= $stopover['location'] . ',';
                }
            }
        }

        return $list;
    }

}