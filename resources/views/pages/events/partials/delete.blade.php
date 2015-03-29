{!! Form::open(array('action' => array('EventsController@destroy', $event->id), 'method' => 'delete')) !!}
<button type="submit" class="btn btn-danger">Delete</button>
{!! Form::close() !!}