@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>{{ $carpooling->departure }} -> {{ $carpooling->arrival }}</h1>
            <p> {{ $carpooling->description }} </p>
            <p> {{ $carpooling->price }} </p>
            <p> {{ $carpooling->seats }} </p>

            <ul>
            @foreach($carpooling->stopovers as $stopover)
                <li>{{$stopover->location}}</li>
            @endforeach
            </ul>

            <a href="{{ action('CarpoolingsController@edit', [ 'id' => $carpooling->id ]) }}">{{ trans('carpoolings.edit-action') }}</a>
        </div>
    </div>
@stop