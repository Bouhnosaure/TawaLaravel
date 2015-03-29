@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>{{ trans('events.edit-action') }} : {{ $event->name }}</h1>

            <hr/>

            @include('errors.list')

            {!! Form::model($event, ['method' => 'PATCH', 'action' => ['EventsController@update', $event->id ]]) !!}

            @include('pages.events.partials.form',['submitButtonName'=>Lang::get('events.edit-action'), 'create' => false])

            {!! Form::close() !!}

            @include('pages.events.partials.delete')


        </div>
    </div>
@stop

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
@stop

@section('js-apps-cope')
    App.datetimepicker_event();
    App.googlemaps_autocomplete('location');
    App.enable_tageditor('tags');
@stop