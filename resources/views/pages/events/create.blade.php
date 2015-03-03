@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Create Event</h1>

            <hr/>

            @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            {!! Form::open(['route' => 'events.store']) !!}

            {!! Form::hidden('user_id', 1) !!}

            <!--- name Field --->
            <div class="form-group">
                {!! Form::label('name', 'Name :') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <!--- description Field --->
            <div class="form-group">
                {!! Form::label('description', 'description :') !!}
                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
            </div>

            <!--- Date debut Field --->
            <div class="form-group">
                {!! Form::label('start_time', 'Date debut:') !!}
                {!! Form::text('start_time', null, ['class' => 'form-control']) !!}
            </div>

            <!--- Date Fin Field --->
            <div class="form-group">
                {!! Form::label('end_time', 'Date Fin:') !!}
                {!! Form::text('end_time', null, ['class' => 'form-control']) !!}
            </div>

            <!---  Field --->
            <div class="form-group">
                {!! Form::submit('Envoyer', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}


        </div>
    </div>
@stop

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            var App = new $.App('fr');
            App.datetimepicker_event();
        });
    </script>
@stop