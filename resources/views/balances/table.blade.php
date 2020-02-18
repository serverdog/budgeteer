<div class="table-responsive">
    <table class="table" id="balances-table">
        <thead>
            <tr>
                <th>User Id</th>
        <th>Account Id</th>
        <th>Accounttype Id</th>
        <th>Currency Id</th>
        <th>Date</th>
        <th>Amount</th>
        <th>Latest</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($balances as $balance)
            <tr>
                <td>{{ $balance->user_id }}</td>
            <td>{{ $balance->account_id }}</td>
            <td>{{ $balance->accounttype_id }}</td>
            <td>{{ $balance->currency_id }}</td>
            <td>{{ $balance->date }}</td>
            <td>{{ $balance->amount }}</td>
            <td>{{ $balance->latest }}</td>
                <td>
                    {!! Form::open(['route' => ['balances.destroy', $balance->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('balances.show', [$balance->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('balances.edit', [$balance->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
