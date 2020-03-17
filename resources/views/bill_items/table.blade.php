<div class="table-responsive">
    <table class="table" id="billItems-table">
        <thead>
            <tr>
                <th>Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($billItems as $billItem)
            <tr>
                <td>{{ $billItem->name }}</td>
                <td>
                    {!! Form::open(['route' => ['billItems.destroy', $billItem->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('billItems.show', [$billItem->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('billItems.edit', [$billItem->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
