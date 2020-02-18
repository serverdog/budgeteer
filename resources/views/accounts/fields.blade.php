<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Accounttype Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('accounttype_id', 'Accounttype Id:') !!}
    {!! Form::number('accounttype_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Currency Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('currency_id', 'Currency Id:') !!}
    {!! Form::number('currency_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Interest Rate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('interest_rate', 'Interest Rate:') !!}
    {!! Form::number('interest_rate', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('accounts.index') }}" class="btn btn-default">Cancel</a>
</div>
