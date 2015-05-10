<!--- name Field --->
<div class="form-group">
    {!! Form::label('code', Lang::get('confirmation.phone-code-field')) !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!---  Field --->
<div class="form-group">
    {!! Form::submit(Lang::get('confirmation.submit-button'), ['class' => 'btn btn-primary', 'name' => 'submit-confirmation-code']) !!}
</div>