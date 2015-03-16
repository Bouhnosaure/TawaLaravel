@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>{{ trans('carpoolings.create-action') }}</h1>

            <hr/>

            @include('errors.list')

            {!! Form::open(['action' => 'CarpoolingsController@store']) !!}

            @include('pages.carpoolings.partials.form',['submitButtonName'=>Lang::get('carpoolings.create-action'), 'create' => true])

            {!! Form::close() !!}


        </div>
    </div>
@stop

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
@stop

@section('js-apps-cope')
    App.datetimepicker_event();
    App.googlemaps_autocomplete('location');
    App.enable_touchspin('seats');
@stop
