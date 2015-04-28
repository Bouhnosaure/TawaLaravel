@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>{{ $carpooling->departure }} → {{ $carpooling->arrival }}</h1>

            {{ trans('carpoolings.description-field') }}
            <p id="carpooling-description">{{ $carpooling->description }}</p>

            {{ trans('carpoolings.price-field') }}
            <p id="carpooling-price">{{ $carpooling->price }} </p>

            {{ trans('carpoolings.seats-field') }}
            <p id="carpooling-seats">{{ $carpooling->seats }} </p>

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