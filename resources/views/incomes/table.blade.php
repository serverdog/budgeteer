<div class="table-responsive">
    <table class="table" id="incomes-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>When</th>
                <th>Amount</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($incomes as $income)
            <tr>
                <td>{{ $income->name }}</td>
                <td>{{ ordinal($income->dayofmonth) }} of the month</td>
                <td>{{ $income->currency->code }}{{ format($income->amount) }}</td>
                <td>
                    {!! Form::open(['route' => ['incomes.destroy', $income->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('incomes.show', [$income->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('incomes.edit', [$income->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
