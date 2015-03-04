@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Edit : {{ $event->name }}</h1>

            <hr/>

            @include('errors.list')

            {!! Form::model($event, ['method' => 'PATCH', 'route' => ['events.update', $event->id ]]) !!}

            @include('pages.events.partials.form',['submitButtonName'=>'Modifier', 'create' => false])

            {!! Form::close() !!}


        </div>
    </div>
@stop

@section('scripts')
    @include('scripts.forms.event')
@stop