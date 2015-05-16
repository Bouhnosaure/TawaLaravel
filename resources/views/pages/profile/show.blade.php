@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <div class="profile">
                    <img align="left" class="profile-image-lg" src="{{asset('images/'.$user->profile->image_wide)}}"/>
                    <img align="left" class="profile-image-sm thumbnail" src="{{asset('images/'.$user->profile->image_min)}}"/>
                    <div class="profile-text">
                        <h1>{{$user->name}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop