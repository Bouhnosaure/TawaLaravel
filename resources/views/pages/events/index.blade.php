@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Events</h1>
        </div>

        <hr/>

        <a href="{{ route('events.create') }}">New event</a>

        <div class="col-md-12">
            @foreach($events as $event)
                <article>
                    <h2>
                        <a href="{{ route('events.show', [ 'id' => $event->id ]) }}">
                            {{ $event->name }}
                        </a>
                    </h2>

                    <p> {{ $event->description }} </p>
                </article>
            @endforeach

            {!! $events->render() !!}

        </div>
    </div>
@stop