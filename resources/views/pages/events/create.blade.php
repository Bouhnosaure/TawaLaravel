@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Create Event</h1>

            <hr/>

            @include('errors.list')

            {!! Form::open(['route' => 'events.store']) !!}

            @include('pages.events.partials.form',['submitButtonName'=>'Créer', 'create' => true])

            {!! Form::close() !!}


        </div>
    </div>
@stop

@section('scripts')
    @include('scripts.forms.event')
@stop