<img src="{{asset('images/'.$user->profile->image_wide)}}" class="img-responsive" id="img-wide-preview" alt="Responsive image">

<div class="form-group">
    {!! Form::label('image', Lang::get('user.cropper-wide-field')) !!}
    {!! Form::file('image', ['id'=> 'image_profile_wide', 'class' => 'form-control']) !!}
    {!! Form::hidden('crop_options', NULL, ['id'=> 'crop_options_wide'])!!}
    {!! Form::hidden('image_type','wide')!!}
</div>

@section('js-app-scope')
    App.cropper_profile_initialize('wide');
@stop
