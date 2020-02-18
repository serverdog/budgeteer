<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $account->user_id }}</p>
</div>

<!-- Accounttype Id Field -->
<div class="form-group">
    {!! Form::label('accounttype_id', 'Accounttype Id:') !!}
    <p>{{ $account->accounttype_id }}</p>
</div>

<!-- Currency Id Field -->
<div class="form-group">
    {!! Form::label('currency_id', 'Currency Id:') !!}
    <p>{{ $account->currency_id }}</p>
</div>

<!-- Interest Rate Field -->
<div class="form-group">
    {!! Form::label('interest_rate', 'Interest Rate:') !!}
    <p>{{ $account->interest_rate }}</p>
</div>

