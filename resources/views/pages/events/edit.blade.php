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


        </div>
    </div>
@stop

@section('scripts')
    @include('scripts.forms.event')
@stop