<div class="table-responsive">
    <table class="table" id="bills-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Weekly</th>
                <th>Monthly</th>
                <th>Yearly</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($bills as $bill)
       
            <tr>
                <td>{{ $bill->name }}</td>
                <td>{{ !empty($bill->weekly) ? currency_format($bill->weekly, currency()->getUserCurrency()) : "" }}</td>
                <td>{{ !empty($bill->monthly) ? currency_format($bill->monthly, currency()->getUserCurrency()) : "" }}</td>
                <td>{{ !empty($bill->yearly) ? currency_format($bill->yearly, currency()->getUserCurrency()) : "" }}</td>
                <td>
                    {!! Form::open(['route' => ['bills.destroy', $bill->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('bills.show', [$bill->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('bills.edit', [$bill->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
