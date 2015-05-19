@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>{{ _('title.events.create-action') }}</h1>

            <hr/>

            @include('errors.list')

            {!! Form::open(['action' => 'EventsController@store']) !!}

            @include('pages.events.partials.form',['submitButtonName'=>_('button.events.create-action'), 'create' => true])

            {!! Form::close() !!}


        </div>
    </div>
@stop

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
@stop

@section('js-app-scope')
    App.datetimepicker_event();
    App.googlemaps_autocomplete('location');
    App.enable_tageditor('tags');
@stop
