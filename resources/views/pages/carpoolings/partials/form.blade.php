@if($create)
    <!--- description Field --->
    <div class="form-group">
        {!! Form::label('event_id', Lang::get('carpoolings.event-field')) !!}
        {!! Form::select('event_id', $events, null, ['class' => 'form-control']) !!}
    </div>
@else
    {!! Form::hidden('event_id', null) !!}
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
@if($create)
    <!--- Ville  Field --->
    <div class="form-group">
        {!! Form::label('location', Lang::get('carpoolings.location-field')) !!}
        {!! Form::text('location', null, ['class' => 'form-control']) !!}
    </div>
@else
    <!--- Ville  Field --->
    <div class="form-group">
        {!! Form::label('location', Lang::get('carpoolings.location-field')) !!}
        {!! Form::text('location', $carpooling->departure, ['class' => 'form-control']) !!}
    </div>
@endif


<!--- Price Field --->
<div class="form-group">
    {!! Form::label('price', Lang::get('carpoolings.price-field')) !!}
    <div class="input-group">
        {!! Form::text('price', null, ['class' => 'form-control']) !!}
        <div class="input-group-addon">€</div>
    </div>
</div>


@if($create)
    <!--- Seats Field --->
    <div class="form-group">
        {!! Form::label('seats', Lang::get('carpoolings.seats-field')) !!}
        {!! Form::text('seats', 1, ['class' => 'form-control']) !!}
    </div>
@else
    <!--- Seats Field --->
    <div class="form-group">
        {!! Form::label('seats', Lang::get('carpoolings.seats-field')) !!}
        {!! Form::text('seats', null, ['class' => 'form-control']) !!}
    </div>
@endif

<!--- Flexible Field --->
<div class="form-group">
    {!! Form::label('is_flexible', Lang::get('carpoolings.flexible-field')) !!}
    <div class="radio">
        <label>
            {!! Form::radio('is_flexible', '1') !!}
            {!! Form::label('is_flexible', Lang::get('general.yes')) !!}
        </label>
    </div>
    <div class="radio">
        <label>
            {!! Form::radio('is_flexible', '0', true) !!}
            {!! Form::label('is_flexible', Lang::get('general.no')) !!}
        </label>
    </div>
</div>

<!--- luggage Field --->
<div class="form-group">
    {!! Form::label('is_luggage', Lang::get('carpoolings.luggage-field')) !!}
    <div class="radio">
        <label>
            {!! Form::radio('is_luggage', '1') !!}
            {!! Form::label('is_luggage', Lang::get('general.yes')) !!}
        </label>
    </div>
    <div class="radio">
        <label>
            {!! Form::radio('is_luggage', '0', true) !!}
            {!! Form::label('is_luggage', Lang::get('general.no')) !!}
        </label>
    </div>
</div>


@if($create)
    <!--- Stopovers Field --->
    <div class="form-group">
        {!! Form::label('stopovers', Lang::get('carpoolings.stopovers-field')) !!}
        {!! Form::text('stopovers', null, ['class' => 'form-control']) !!}
    </div>
@else
    <!--- Stopovers Field --->
    <div class="form-group">
        {!! Form::label('stopovers', Lang::get('carpoolings.stopovers-field')) !!}
        {!! Form::text('stopovers', $carpooling->stopovers_between, ['class' => 'form-control']) !!}
    </div>
@endif

        <!---  Field --->
<div class="form-group">
    {!! Form::submit($submitButtonName, ['class' => 'btn btn-primary', 'name' => 'submit-carpooling-create']) !!}
</div>