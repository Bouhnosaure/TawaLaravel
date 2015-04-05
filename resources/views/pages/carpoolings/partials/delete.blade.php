{!! Form::open(array('action' => array('CarpoolingsController@destroy', $carpooling->id), 'method' => 'delete')) !!}
<button type="submit" class="btn btn-danger" name="submit-event-delete" >Delete</button>
{!! Form::close() !!}