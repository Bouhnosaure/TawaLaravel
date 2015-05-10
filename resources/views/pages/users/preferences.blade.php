@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('user.preferences') }}</div>
                    <div class="panel-body">

                        @include('errors.auth')

                        {!! Form::model($user, ['method' => 'PATCH','action' => 'UsersController@update', 'class'=> 'form-horizontal']) !!}

                        @include('pages.users.partials.form-edit')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection