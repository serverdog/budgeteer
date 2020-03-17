@component("card", ["size" => "12 border-dark no-padding card-full" , "title_bg" => "bg-gradient-success text-gray-100", "title" => "Household Bills"])

<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Bill</th>
                <th>Weekly Cost</th>
                <th>Monthly Cost</th>
                <th>Yearly Cost</th>
            </tr>
        </thead> 
        <tbody>
            @if ($items->count())

                @foreach ($items as $item)
                    <tr>
                        <td width='50%'>
                            <a href="#" class="btn btn-danger btn-sm removeRow"><i class="fas fa-times"></i></a>
                            {!! Form::text($item->id.'[name]', $item->name,['class'=>'col-10']) !!}
                        </td>
                        <td>
                            {!! Form::number($item->id.'[weekly]',  null, ['class' => 'form-control','step'=>'any']) !!}
                        </td>
                        <td>
                            {!! Form::number($item->id.'[monthly]',  null, ['class' => 'form-control','step'=>'any']) !!}
                        </td>
                        <td>
                            {!! Form::number($item->id.'[yearly]',  null, ['class' => 'form-control','step'=>'any']) !!}
                        </td>
                    </tr>

                @endforeach
            @endif
        </tbody>
    </table>
</div>
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('bills.index') }}" class="btn btn-default">Cancel</a>
</div>

@endcomponent
    
@push('js')
<script type="text/javascript">
(function($) {
  "use strict"; // Start of use strict
  $(document).on('click', '.removeRow', function(e){
        e.preventDefault();
        $(this).closest("tr").remove();
    });
})(jQuery); // End of use strict

</script>
@endpush