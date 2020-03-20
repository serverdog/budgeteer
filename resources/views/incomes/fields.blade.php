@php

   
    $numberFormatter = new NumberFormatter('en_US', NumberFormatter::ORDINAL);
    $daysofmonth = collect(range(1,31))->mapWithKeys(function ($value) use($numberFormatter) {
        return [$value => $numberFormatter->format($value)];
    });
        
@endphp
<div class="row">
<!-- Currency Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('currency_id', 'Currency:') !!}
    {!! Form::select('currency_id', $currencies, null, ['class' => 'form-control']) !!}
</div>

<!-- Dayofmonth Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dayofmonth', 'What day of the month:') !!}
    {!! Form::select('dayofmonth', $daysofmonth,  null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::number('amount', null, ['class' => 'form-control','step'=>'any']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('incomes.index') }}" class="btn btn-default">Cancel</a>
</div>
