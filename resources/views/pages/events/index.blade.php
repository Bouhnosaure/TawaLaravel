@extends('app')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <h1>{{ trans('events.events') }}</h1>
        </div>
        <div class="col-md-6">
            <a href="{{ action('EventsController@create') }}"
               class="btn btn-info pull-right">{{ trans('events.create-action') }}</a>
        </div>
    </div>

    <hr/>

    <div class="row">
        <div id="posts" class="events small-thumbs">
            @foreach($events as $event)
                <div class="entry clearfix">
                    <div class="entry-image">
                        <a href="{{ action('EventsController@show', [ 'id' => $event->slug ]) }}">
                            <img class="media-object events-list-img" src="{{ $event->image_min }}"
                                 alt="{{ $event->name }}">

                            <div class="entry-date" style="display: none;">{{ $event->start_time }}</div>
                        </a>
                    </div>
                    <div class="entry-c">
                        <div class="entry-title">
                            <h2>
                                <a href="{{ action('EventsController@show', [ 'id' => $event->slug ]) }}">{{ $event->name }}</a>
                            </h2>
                        </div>
                        <ul class="entry-meta clearfix">
                            <li><i class="fa fa-clock-o"></i>{{ $event->start_time }}</li>
                            <li><i class="fa fa-map-marker"></i>{{ $event->location }}</li>
                        </ul>
                        <div class="entry-content">
                            <p>{{ $event->description }}</p>
                            <a href="{{ action('EventsController@show', [ 'id' => $event->slug ]) }}" id="btn-event-show" class="btn btn-danger">{{ trans('events.show-me') }}</a>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
    {!! $events->render() !!}
@stop


@section('js-apps-cope')
    App.format_date_eventlist('entry-date');
@stop

