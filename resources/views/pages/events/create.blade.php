@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>{{ trans('events.create-action') }}</h1>

            <hr/>

            @include('errors.list')

            {!! Form::open(['action' => 'EventsController@store']) !!}

            @include('pages.events.partials.form',['submitButtonName'=>Lang::get('events.create-action'), 'create' => true])

            {!! Form::close() !!}


        </div>
    </div>
@stop

@section('scripts')
    @include('scripts.forms.event')
@stop