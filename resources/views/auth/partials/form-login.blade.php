<!--- Email Field --->
<div class="form-group">
    <label class="col-md-4 control-label">
        {!! Form::label('email', _('label.auth.email-field')) !!}
    </label>

    <div class="col-md-6">
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!--- Password Field --->
<div class="form-group">
    <label class="col-md-4 control-label">
        {!! Form::label('password', _('label.auth.password-field')) !!}
    </label>
    <div class="col-md-6">
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>
</div>

<!--- Remember me Field --->
<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <div class="checkbox">
            <label>
                {!! Form::checkbox('remember', null, ['class' => 'form-control']) !!}
                {{ _('label.auth.remember-field') }}
            </label>
        </div>
    </div>
</div>

<!--- Submit Field --->
<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit(_('button.auth.login'), ['class' => 'btn btn-primary', 'name' => 'submit-login']) !!}
        <a class="btn btn-link" href="{{ action('Auth\PasswordController@getEmail') }}">{{ _('button.auth.forgot-password') }}</a>
    </div>
</div>