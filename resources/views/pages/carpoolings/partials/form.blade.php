@if($create)
    <!--- description Field --->
    <div class="form-group">
        {!! Form::label('event', Lang::get('carpoolings.event-field')) !!}
        {!! Form::select('event', $events, null, ['class' => 'form-control']) !!}
    </div>
    @endif

            <!--- description Field --->
    <div class="form-group">
        {!! Form::label('description', Lang::get('carpoolings.description-field')) !!}
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>

    <!--- Date debut Field --->
    <div class="form-group">
        {!! Form::label('start_time', Lang::get('carpoolings.start-time-field')) !!}
        {!! Form::text('start_time', null, ['class' => 'form-control']) !!}
    </div>

    <!--- Ville  Field --->
    <div class="form-group">
        {!! Form::label('location', Lang::get('carpoolings.location-field')) !!}
        {!! Form::text('location', null, ['class' => 'form-control']) !!}
    </div>

    <!--- Price Field --->
    <div class="form-group">
        {!! Form::label('price', Lang::get('carpoolings.price-field')) !!}
        <div class="input-group">
            {!! Form::text('price', null, ['class' => 'form-control']) !!}
            <div class="input-group-addon">€</div>
        </div>
    </div>

    <!--- Seats Field --->
    <div class="form-group">
        {!! Form::label('seats', Lang::get('carpoolings.seats-field')) !!}
        {!! Form::text('seats', 1, ['class' => 'form-control']) !!}
    </div>

    <!--- Stopovers Field --->
    <div class="form-group">
        {!! Form::label('stopovers', Lang::get('carpoolings.stopovers-field')) !!}
        {!! Form::text('stopovers', null, ['class' => 'form-control']) !!}
    </div>

    <!---  Field --->
    <div class="form-group">
        {!! Form::submit($submitButtonName, ['class' => 'btn btn-primary']) !!}
    </div>