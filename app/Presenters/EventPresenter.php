<?php

namespace App\Presenters;

use App\Carpooling;
use App\Event;
use McCool\LaravelAutoPresenter\BasePresenter;

class EventPresenter extends BasePresenter
{
    public function __construct(Event $resource)
    {
        $this->wrappedObject = $resource;
    }
}
