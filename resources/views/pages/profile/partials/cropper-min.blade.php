<img src="{{asset('images/'.$user->profile->image_min)}}" class="img-responsive" id="img-min-preview" alt="Responsive image">

<div class="form-group">
    {!! Form::label('image', Lang::get('user.cropper-min-field')) !!}
    {!! Form::file('image', ['id'=> 'image_profile_min', 'class' => 'form-control']) !!}
    {!! Form::hidden('crop_options', NULL, ['id'=> 'crop_options_min'])!!}
    {!! Form::hidden('image_type','min')!!}
</div>

@section('js-app-scope')
    App.cropper_profile_initialize('min');
@stop
