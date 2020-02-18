<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Period Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('period_id', 'Period Id:') !!}
    {!! Form::number('period_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::number('amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Due Field -->
<div class="form-group col-sm-6">
    {!! Form::label('due', 'Due:') !!}
    {!! Form::date('due', null, ['class' => 'form-control','id'=>'due']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#due').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('liabilities.index') }}" class="btn btn-default">Cancel</a>
</div>
