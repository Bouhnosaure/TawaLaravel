@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ action('EventsController@edit', [ 'id' => $event->slug ]) }}" class="btn btn-info">{{ trans('events.edit-action') }}</a>
            
            <h1 id="event-name">{{ $event->name }}</h1>

            {{ trans('events.location-field') }}
            <h5 id="event-location">{{ $event->location }}</h5>

            {{ trans('events.description-field') }}
            <p id="event-description">{{ $event->description }} </p>

            <hr>

            <h3>{{ trans('carpoolings.carpoolings') }}</h3>

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
                                    {{ $carpooling->PresentDeparture }} → {{$carpooling->PresentArrival }}
                                </h4>
                            </a>
                            <h5>{{ trans('events.events') }} {{ $carpooling->event->name }}</h5>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@stop