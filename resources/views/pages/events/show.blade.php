@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>{{ $event->name }}</h1>

            <p> {{ $event->description }} </p>

            <ul>
                @foreach($event->tagNames() as $tag)
                    <li>{{$tag}}</li>
                @endforeach
            </ul>

            <a href="{{ action('EventsController@edit', [ 'id' => $event->id ]) }}">{{ trans('events.edit-action') }}</a>
        </div>
    </div>
@stop