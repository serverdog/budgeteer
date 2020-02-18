<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $liability->user_id }}</p>
</div>

<!-- Period Id Field -->
<div class="form-group">
    {!! Form::label('period_id', 'Period Id:') !!}
    <p>{{ $liability->period_id }}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $liability->amount }}</p>
</div>

<!-- Due Field -->
<div class="form-group">
    {!! Form::label('due', 'Due:') !!}
    <p>{{ $liability->due }}</p>
</div>

