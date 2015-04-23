@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>{{ trans('carpoolings.name-field') }} {{ $carpooling->departure }} → {{ $carpooling->arrival }}</h1>

            <p>{{ trans('carpoolings.description-field') }} {{ $carpooling->description }}</p>

            <p>{{ trans('carpoolings.price-field') }} {{ $carpooling->price }} </p>

            <p>{{ trans('carpoolings.seats-field') }} {{ $carpooling->seats }} </p>

            <hr>

            <h3>{{ trans('carpoolings.stopovers-field') }}</h3>
            <ul>
                @foreach($carpooling->stopovers as $stopover)
                    <li>{{$stopover->location}}</li>
                @endforeach
            </ul>

            <a href="{{ action('CarpoolingsController@edit', [ 'id' => $carpooling->id ]) }}">{{ trans('carpoolings.edit-action') }}</a>
        </div>
    </div>
@stop