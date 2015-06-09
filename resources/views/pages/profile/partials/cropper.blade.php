<div class="form-group">
    <label for="image">{{trans('user.cropper-'.$type.'-field')}}</label>
    <input id="image_profile_{{$type}}" class="form-control" name="image" type="file">
    <input id="crop_options_{{$type}}" name="crop_options" type="hidden" value="">
    <input name="image_type" type="hidden" value="{{$type}}">
</div>

@section('js-app-scope')
    @parent
    App.cropper_initialize('{{$type}}');
@stop