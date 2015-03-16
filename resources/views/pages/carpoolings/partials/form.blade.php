@if($create)
    <!--- description Field --->
    <div class="form-group">
        {!! Form::label('event', '--Evenement :') !!}
        {!! Form::select('event', $events, null, ['class' => 'form-control']) !!}
    </div>
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

    <!--- Ville  Field --->
    <div class="form-group">
        {!! Form::label('location', Lang::get('events.location-field')) !!}
        {!! Form::text('location', null, ['class' => 'form-control']) !!}
    </div>

    <!--- Price Field --->
    <div class="form-group">
        {!! Form::label('price', '--Price:') !!}
        <div class="input-group">
            {!! Form::text('price', null, ['class' => 'form-control']) !!}
            <div class="input-group-addon">€</div>
        </div>
    </div>

    <!--- Seats Field --->
    <div class="form-group">
        {!! Form::label('seats', '--Seats:') !!}
        {!! Form::text('seats', 1, ['class' => 'form-control']) !!}
    </div>

    <ul id="sortable">
        <li class="ui-state-default">
            <!--- StopOver Field --->
            <div class="form-group">
                {!! Form::label('stopovers[]', 'StopOver:') !!}
                {!! Form::text('stopovers[]', null, ['class' => 'form-control']) !!}
            </div>
        </li>
        <li class="ui-state-default">
            <!--- StopOver Field --->
            <div class="form-group">
                {!! Form::label('stopovers[]', 'StopOver:') !!}
                {!! Form::text('stopovers[]', null, ['class' => 'form-control']) !!}
            </div>
        </li>
    </ul>


    <!---  Field --->
    <div class="form-group">
        {!! Form::submit($submitButtonName, ['class' => 'btn btn-primary']) !!}
    </div>