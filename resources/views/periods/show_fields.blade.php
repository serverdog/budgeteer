<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $period->name }}</p>
</div>

<!-- Method Field -->
<div class="form-group">
    {!! Form::label('method', 'Method:') !!}
    <p>{{ $period->method }}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $period->amount }}</p>
</div>

