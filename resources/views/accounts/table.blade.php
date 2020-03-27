<div class="table-responsive">
    
    <table class="table align-items-center">
        <thead class="thead-light">
            <tr>
                <th>Name</th>
                <th>Account Type</th>
                <th>Currency</th>
                <th>Interest Rate</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody  class="list">
        @foreach($accounts as $account)
            <tr>
                <td>{{ $account->name }}</td>
                <td>{{ $account->accounttype->name }}</td>
                <td>{{ $account->currency->name }}</td>
                <td>{{ $account->interest_rate }}%</td>
                <td>
                    {!! Form::open(['route' => ['accounts.destroy', $account->id], 'method' => 'delete']) !!}
                   
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                 
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
