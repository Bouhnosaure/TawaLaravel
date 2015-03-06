@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Events</h1>
            <a href="{{ action('CarpoolingsController@create') }}">{{ trans('carpoolings.create-action') }}</a>
        </div>
        <hr/>
    </div>
    <div class="row">
        @foreach($carpoolings as $carpooling)
            <div class="media event-list">
                <div class="media-left">
                    <a href="{{ action('CarpoolingsController@show', [ 'id' => $carpooling->id ]) }}">
                        <img class="media-object events-list-img" src="{{ $carpooling->event->image_min }}" alt="{{ $carpooling->event->name }}">
                    </a>
                </div>
                <div class="media-body">
                    <a href="{{ action('CarpoolingsController@show', [ 'id' => $carpooling->id ]) }}">
                        <h4 class="media-heading">
                            {{ $carpooling->departure }}
                            -> {{ $carpooling->arrival }}
                        </h4>
                    </a>
                    <h5>@ {{ $carpooling->location }}</h5>

                    <p class="list-group-item-text">{{ $carpooling->description }}</p>
                </div>
            </div>
        @endforeach
    </div>
    {!! $carpoolings->render() !!}
@stop

