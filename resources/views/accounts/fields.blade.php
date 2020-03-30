
    {!! Form::hidden('user_id', Auth::id(), ['class' => 'form-control']) !!}


<!-- Accounttype Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('accounttype_id', 'Account Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>


<!-- Accounttype Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('accounttype_id', 'Account Type:') !!}
    {!! Form::select('accounttype_id', $accounttypes, null, ['class' => 'form-control']) !!}
</div>

<!-- Currency Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('currency_id', 'Currency:') !!}
    {!! Form::select('currency_id', $currencies, Auth::user()->currency_id, ['class' => 'form-control']) !!}
</div>

<!-- Interest Rate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('interest_rate', 'Interest Rate:') !!}
    {!! Form::number('interest_rate', null, ['class' => 'form-control','step'=>'any']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('accounts.index') }}" class="btn btn-default">Cancel</a>
</div>
