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
        return $stopovers->getQuery()->orderBy('carpooling_order','ASC')->get()->first()->toArray()['location'];
    }

    public function arrival()
    {
        $stopovers = $this->wrappedObject->stopovers();
        return $stopovers->getQuery()->orderBy('carpooling_order','DESC')->get()->first()->toArray()['location'];
    }

}