<div class="table-responsive">
    <table class="table" id="accounttypes-table">
        <thead>
            <tr>
                <th>Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($accounttypes as $accounttype)
            <tr>
                <td>{{ $accounttype->name }}</td>
                <td>
                    {!! Form::open(['route' => ['accounttypes.destroy', $accounttype->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('accounttypes.show', [$accounttype->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('accounttypes.edit', [$accounttype->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
