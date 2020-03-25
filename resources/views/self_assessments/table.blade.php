<div class="table-responsive">
    <table class="table" id="selfAssessments-table">
        <thead>
            <tr>
                
                <th>Year</th>
                <th>Name</th>
                <th>Total Dividends</th>
                <th>Share</th>
                <th>Salary</th>
                <th>Savings</th>
                <th>Other</th>
                <th>July Payment</th>
                <th>Tax Due</th>
                <th>Active</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($selfAssessments as $selfAssessment)
            <tr>
                
                <td>{{ $selfAssessment->year }}</td>
                <td>{{ $selfAssessment->name }}</td>
                <td>{{ format($selfAssessment->total_dividends) }}</td>
                <td>{{ $selfAssessment->share }}</td>
                <td>{{ format($selfAssessment->salary) }}</td>
                <td>{{ format($selfAssessment->savings) }}</td>
                <td>{{ format($selfAssessment->other) }}</td>
                <td>{{ format($selfAssessment->july_payment) }}</td>
                <td>{{ format($selfAssessment->tax) }}</td>
                <td>{{ $selfAssessment->active == 1 ? "Yes" : "No" }}</td>
                <td>
                    {!! Form::open(['route' => ['selfAssessments.destroy', $selfAssessment->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('selfAssessments.show', [$selfAssessment->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('selfAssessments.edit', [$selfAssessment->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
