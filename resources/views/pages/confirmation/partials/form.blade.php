<!--- name Field --->
<div class="form-group">
    {!! Form::label('code', _('label.confirmation.phone-code-field')) !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!---  Field --->
<div class="form-group">
    {!! Form::submit(_('button.confirmation.submit-button'), ['class' => 'btn btn-primary', 'name' => 'submit-confirmation-code']) !!}
</div>