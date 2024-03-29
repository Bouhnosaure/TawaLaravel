@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('auth.login') }}</div>
                    <div class="panel-body">

                        @include('errors.auth')

                        {!! Form::open(['action' => 'Auth\AuthController@postLogin', 'class'=> 'form-horizontal']) !!}

                        @include('auth.partials.form-login')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection