@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @foreach($carpoolings as $carpooling)
                <a href="{{ action('CarpoolingsController@show', [ 'id' => $carpooling->id ]) }}">
                    {{ $carpooling->departure }} → {{ $carpooling->arrival }}
                </a>
                <br>
                <br>
            @endforeach
        </div>
    </div>
@stop