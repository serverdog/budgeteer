<div class="row">
    <div class="alert alert-primary col-10 m-4" role="alert">
        Select one of your accounts, or give it a name if not related to one of your accounts.
    </div>
    
    <div class="form-group col-sm-6">
        {!! Form::label('amount', 'Account:') !!}
        {!! Form::select('account_id', [null => 'None'] + $accounts->toArray(), null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('amount', 'Name:') !!}
        {!! Form::text('name',  null, ['class' => 'form-control']) !!}
    </div>

    <!-- Amount Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('amount', 'Amount:') !!}
        {!! Form::number('amount', null, ['class' => 'form-control','step'=>'any']) !!}
    </div>

    <!-- Due Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('due', 'Due:') !!}
        {!! Form::date('due', null, ['class' => 'form-control','id'=>'due']) !!}
    </div>


    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('liabilities.index') }}" class="btn btn-default">Cancel</a>
    </div>
</div>