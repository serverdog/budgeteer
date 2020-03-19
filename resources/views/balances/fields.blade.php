<div class="form-group col-sm-12">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::date('date', now(), ['class' => 'form-control datepicker col-4','id'=>'date']) !!}
</div>
<hr/>


@if ($accounts->count())
    @php
        $groups = $accounts->groupBy('accounttype_id');
    @endphp
    @foreach ($groups as $groupedAccounts)
        @component("card", ["size" => "6 border-dark no-padding card-full" , "title_bg" => "bg-gradient-success text-gray-100", "title" => Str::plural($groupedAccounts->first()->Accounttype->name)])

            @foreach ($groupedAccounts as $account)
            <div class="row">
                <!-- Account Id Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('account_id', $account->name) !!}
                    {!! Form::hidden($account->id.'[account_id]', $account->id) !!}
                </div>


                <!-- Amount Field -->
                <div class="form-group col-sm-6">
                
                    {!! Form::number($account->id.'[amount]', $balances[$account->id] ?? null, ['class' => 'form-control','step'=>'any']) !!}
                </div>
            </div>
            @endforeach
        @endcomponent
    @endforeach
@endif
    

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('balances.index') }}" class="btn btn-default">Cancel</a>
</div>
