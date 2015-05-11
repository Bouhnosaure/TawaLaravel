<!--- username  Field --->
<div class="form-group">
    <label class="col-md-4 control-label">
        {!! Form::label('username', Lang::get('user.username-field')) !!}
    </label>

    <div class="col-md-6">
        {!! Form::text('username', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!--- firstname  Field --->
<div class="form-group">
    <label class="col-md-4 control-label">
        {!! Form::label('firstname', Lang::get('user.firstname-field')) !!}
    </label>

    <div class="col-md-6">
        {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!--- lastname  Field --->
<div class="form-group">
    <label class="col-md-4 control-label">
        {!! Form::label('lastname', Lang::get('user.lastname-field')) !!}
    </label>

    <div class="col-md-6">
        {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!--- Email Field --->
<div class="form-group">
    <label class="col-md-4 control-label">
        {!! Form::label('email', Lang::get('user.email-field')) !!}
    </label>

    <div class="col-md-6">
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!--- phone Field --->
<div class="form-group">
    <label class="col-md-4 control-label">
        {!! Form::label('phone', Lang::get('user.phone-field')) !!}
    </label>

    <div class="col-md-6">
        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit(Lang::get('user.submit-edit'), ['class' => 'btn btn-primary', 'name' => 'submit-edit']) !!}
    </div>
</div>
