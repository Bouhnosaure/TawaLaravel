@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @foreach($events as $event)
                <a href="{{ action('EventsController@show', [ 'id' => $event->slug ]) }}">
                    {{ $event->name }}
                </a>
                <br>
                <br>
            @endforeach
        </div>
    </div>
@stop