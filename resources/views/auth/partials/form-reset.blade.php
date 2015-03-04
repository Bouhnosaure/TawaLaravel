{!! Form::hidden('token', $token) !!}

<!--- Email Field --->
<div class="form-group">
    <label class="col-md-4 control-label">
        {!! Form::label('email', Lang::get('auth.email-field')) !!}
    </label>

    <div class="col-md-6">
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!--- Password Field --->
<div class="form-group">
    <label class="col-md-4 control-label">
        {!! Form::label('password', Lang::get('auth.password-field')) !!}
    </label>
    <div class="col-md-6">
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>
</div>

<!--- Password confirmation Field --->
<div class="form-group">
    <label class="col-md-4 control-label">
        {!! Form::label('password_confirmation', Lang::get('auth.password-confirmation-field')) !!}
    </label>
    <div class="col-md-6">
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit(Lang::get('auth.reset'), ['class' => 'btn btn-primary']) !!}
    </div>
</div>