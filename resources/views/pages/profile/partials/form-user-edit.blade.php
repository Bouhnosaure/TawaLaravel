<!--- username  Field --->
<div class="form-group">
    <label class="col-md-4 control-label">
        {!! Form::label('name', _('label.user.username-field')) !!}
    </label>

    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!--- Email Field --->
<div class="form-group">
    <label class="col-md-4 control-label">
        {!! Form::label('email', _('label.user.email-field')) !!}
    </label>

    <div class="col-md-6">
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!--- firstname  Field --->
<div class="form-group">
    <label class="col-md-4 control-label">
        {!! Form::label('profile[firstname]', _('label.user.firstname-field')) !!}
    </label>

    <div class="col-md-6">
        {!! Form::text('profile[firstname]', null, ['id' => 'firstname' ,'class' => 'form-control']) !!}
    </div>
</div>

<!--- lastname  Field --->
<div class="form-group">
    <label class="col-md-4 control-label">
        {!! Form::label('profile[lastname]', _('label.user.lastname-field')) !!}
    </label>

    <div class="col-md-6">
        {!! Form::text('profile[lastname]', null, ['id' => 'lastname' ,'class' => 'form-control']) !!}
    </div>
</div>

<!--- phone Field --->
<div class="form-group">
    <label class="col-md-4 control-label">
        {!! Form::label('profile[phone]', _('label.user.phone-field')) !!}
    </label>

    <div class="col-md-6">
        {!! Form::text('profile[phone]', null, ['id' => 'phone' ,'class' => 'form-control']) !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit(_('button.user.submit-edit'), ['class' => 'btn btn-primary', 'name' => 'submit-edit']) !!}
    </div>
</div>
