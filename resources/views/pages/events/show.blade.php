@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>{{ $event->name }}</h1>

            <p> {{ $event->description }} </p>

            <a href="{{ route('events.edit', [ 'id' => $event->id ]) }}">Editer</a>
        </div>
    </div>
@stop