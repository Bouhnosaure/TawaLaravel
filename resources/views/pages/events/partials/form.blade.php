@if($create)
    <!--- name Field --->
    <div class="form-group">
        {!! Form::label('name', Lang::get('events.name-field')) !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
@else
    {!! Form::hidden('name', null) !!}
@endif


        <!--- description Field --->
<div class="form-group">
    {!! Form::label('description', Lang::get('events.description-field')) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!--- Date debut Field --->
<div class="form-group">
    {!! Form::label('start_time', Lang::get('events.start-time-field')) !!}
    {!! Form::text('start_time', null, ['class' => 'form-control']) !!}
</div>

<!--- Date Fin Field --->
<div class="form-group">
    {!! Form::label('end_time', Lang::get('events.end-time-field')) !!}
    {!! Form::text('end_time', null, ['class' => 'form-control']) !!}
</div>

<!--- Ville  Field --->
<div class="form-group">
    {!! Form::label('location', Lang::get('events.location-field')) !!}
    {!! Form::text('location', null, ['class' => 'form-control']) !!}
</div>

<!--- Tags Field --->
<div class="form-group">
    {!! Form::label('tags', Lang::get('events.tags-field')) !!}
    {!! Form::text('tags', null, ['class' => 'form-control']) !!}
</div>    
    
<!---  Field --->
<div class="form-group">
    {!! Form::submit($submitButtonName, ['class' => 'btn btn-primary']) !!}
</div>