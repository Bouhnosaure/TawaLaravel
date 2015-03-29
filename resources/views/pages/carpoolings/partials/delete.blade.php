{!! Form::open(array('action' => array('CarpoolingsController@destroy', $carpooling->id), 'method' => 'delete')) !!}
<button type="submit" class="btn btn-danger">Delete</button>
{!! Form::close() !!}