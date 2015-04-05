{!! Form::open(array('action' => array('EventsController@destroy', $event->id), 'method' => 'delete')) !!}
<button type="submit" class="btn btn-danger" name="submit-carpooling-delete">Delete</button>
{!! Form::close() !!}