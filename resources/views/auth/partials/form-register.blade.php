<!--- username  Field --->
<div class="form-group">
    <label class="col-md-4 control-label">
        {!! Form::label('name', _('label.auth.username-field')) !!}
    </label>

    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>

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

<!--- Password confirmation Field --->
<div class="form-group">
    <label class="col-md-4 control-label">
        {!! Form::label('password_confirmation', _('label.auth.password-confirmation-field')) !!}
    </label>

    <div class="col-md-6">
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit(_('button.auth.register'), ['class' => 'btn btn-primary', 'name' => 'submit-register']) !!}
    </div>
</div>
