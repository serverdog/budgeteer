<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $balance->user_id }}</p>
</div>

<!-- Account Id Field -->
<div class="form-group">
    {!! Form::label('account_id', 'Account Id:') !!}
    <p>{{ $balance->account_id }}</p>
</div>

<!-- Accounttype Id Field -->
<div class="form-group">
    {!! Form::label('accounttype_id', 'Accounttype Id:') !!}
    <p>{{ $balance->accounttype_id }}</p>
</div>

<!-- Currency Id Field -->
<div class="form-group">
    {!! Form::label('currency_id', 'Currency Id:') !!}
    <p>{{ $balance->currency_id }}</p>
</div>

<!-- Date Field -->
<div class="form-group">
    {!! Form::label('date', 'Date:') !!}
    <p>{{ $balance->date }}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $balance->amount }}</p>
</div>

<!-- Latest Field -->
<div class="form-group">
    {!! Form::label('latest', 'Latest:') !!}
    <p>{{ $balance->latest }}</p>
</div>

