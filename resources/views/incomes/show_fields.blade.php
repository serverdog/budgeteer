<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $income->user_id }}</p>
</div>

<!-- Currency Id Field -->
<div class="form-group">
    {!! Form::label('currency_id', 'Currency Id:') !!}
    <p>{{ $income->currency_id }}</p>
</div>

<!-- Dayofmonth Field -->
<div class="form-group">
    {!! Form::label('dayofmonth', 'Dayofmonth:') !!}
    <p>{{ $income->dayofmonth }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $income->name }}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $income->amount }}</p>
</div>

