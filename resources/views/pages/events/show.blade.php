@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ action('EventsController@edit', [ 'id' => $event->id ]) }}">{{ trans('events.edit-action') }}</a>

            <h1 id="event-name">{{ $event->name }}</h1>
            <h5 id="event-location">@ {{ $event->location }}</h5>

            <p id="event-description"> {{ $event->description }} </p>

            <div class="row" id="event-carpoolings">
                @foreach($event->carpoolings as $carpooling)

                    <div class="media event-list">
                        <div class="media-left">
                            <a href="{{ action('CarpoolingsController@show', [ 'id' => $carpooling->id ]) }}">
                                <img class="media-object events-list-img" src="{{ $carpooling->event->image_min }}"
                                     alt="{{ $carpooling->event->name }}">
                            </a>
                        </div>
                        <div class="media-body">
                            <a href="{{ action('CarpoolingsController@show', [ 'id' => $carpooling->id ]) }}">
                                <h4 class="media-heading">
                                    {{ $carpooling->PresentDeparture }}
                                    -> {{$carpooling->PresentArrival }}
                                </h4>
                            </a>
                            <h5>@ {{ $carpooling->event->name }}</h5>

                            <p class="list-group-item-text">{{ $carpooling->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@stop