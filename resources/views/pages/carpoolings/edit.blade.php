@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>{{ _('title.carpoolings.edit-action') }} : {{ $carpooling->name }}</h1>

            <hr/>

            @include('errors.list')

            {!! Form::model($carpooling, ['method' => 'PATCH', 'action' => ['CarpoolingsController@update', $carpooling->id ]]) !!}

            @include('pages.carpoolings.partials.form',['submitButtonName'=>_('button.carpoolings.edit-action'), 'create' => false])

            {!! Form::close() !!}

            @include('pages.carpoolings.partials.delete')

        </div>
    </div>
@stop

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
@stop

@section('js-app-scope')
    App.datetimepicker_event();
    App.googlemaps_autocomplete('location');
    App.enable_touchspin('seats');
    App.enable_tageditor('stopovers');
@stop