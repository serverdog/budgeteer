<div class="table-responsive">
    <table class="table" id="liabilities-table">
        <thead>
            <tr>
                <th>User Id</th>
        <th>Period Id</th>
        <th>Amount</th>
        <th>Due</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($liabilities as $liability)
            <tr>
                <td>{{ $liability->user_id }}</td>
            <td>{{ $liability->period_id }}</td>
            <td>{{ $liability->amount }}</td>
            <td>{{ $liability->due }}</td>
                <td>
                    {!! Form::open(['route' => ['liabilities.destroy', $liability->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('liabilities.show', [$liability->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('liabilities.edit', [$liability->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
