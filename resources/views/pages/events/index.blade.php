@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>{{ trans('events.events') }}</h1>
            <a href="{{ action('EventsController@create') }}">{{ trans('events.create-action') }}</a>
        </div>
        <hr/>
    </div>
    <div class="row">
        @foreach($events as $event)
            <div class="media event-list">
                <div class="media-left">
                    <a href="{{ action('EventsController@show', [ 'id' => $event->slug ]) }}">
                        <img class="media-object events-list-img" src="{{ $event->image_min }}" alt="{{ $event->name }}">
                    </a>
                </div>
                <div class="media-body">
                    <a href="{{ action('EventsController@show', [ 'id' => $event->slug ]) }}">
                        <h4 class="media-heading">{{ $event->name }}</h4>
                    </a>
                    <h5>@ {{ $event->location }}</h5>

                    <p class="list-group-item-text">{{ $event->description }}</p>
                </div>
            </div>
        @endforeach
    </div>
    {!! $events->render() !!}
@stop


