@extends('app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('user.preferences') }}</div>
                <div class="panel-body">

                    @include('errors.auth')

                    {!! Form::model($user->toArray(), ['method' => 'PATCH','action' => 'ProfileController@update', 'class'=> 'form-horizontal']) !!}

                    @include('pages.profile.partials.form-user-edit')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('user.image-min') }}</div>
                <div class="panel-body">

                    @include('errors.auth')

                    {!! Form::open(['method' => 'PATCH','action' => 'ProfileController@upload', 'id' => 'form_image_min', 'files' => true, 'class'=> 'form-horizontal']) !!}

                    @include('pages.profile.partials.cropper-min')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('user.image-wide') }}</div>
                <div class="panel-body">

                    @include('errors.auth')

                    {!! Form::open(['method' => 'PATCH','action' => 'ProfileController@upload', 'id' => 'form_image_wide', 'files' => true, 'class'=> 'form-horizontal']) !!}

                    @include('pages.profile.partials.cropper-wide')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

    @include('pages.profile.partials.modal-cropper')

@endsection