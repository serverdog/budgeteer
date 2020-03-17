<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $bill->user_id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $bill->name }}</p>
</div>

<!-- Weekly Field -->
<div class="form-group">
    {!! Form::label('weekly', 'Weekly:') !!}
    <p>{{ $bill->weekly }}</p>
</div>

<!-- Monthly Field -->
<div class="form-group">
    {!! Form::label('monthly', 'Monthly:') !!}
    <p>{{ $bill->monthly }}</p>
</div>

<!-- Yearly Field -->
<div class="form-group">
    {!! Form::label('yearly', 'Yearly:') !!}
    <p>{{ $bill->yearly }}</p>
</div>

