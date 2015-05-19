@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ _('title.auth.register') }}</div>
                    <div class="panel-body">

                        @include('errors.auth')

                        {!! Form::open(['action' => 'Auth\AuthController@postRegister', 'class'=> 'form-horizontal']) !!}

                        @include('auth.partials.form-register')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection