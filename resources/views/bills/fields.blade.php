@component("card", ["size" => "12 border-dark no-padding card-full" , "title_bg" => "bg-gradient-success text-gray-100", "title" => "Household Bills"])
    <p>For this section, please list out any household or regular bills. Do not include any loans or mortgage payments here. 
        Use the <a href='{!! route('liabilities.index') !!}'>Loans</a> section for that.</p>

    @if (!$bills->count())    
        <p>We've got you started with the most common bills, but feel free to remove any that you don't need, or rename them to something that makes sense to you.</p>
    @endif

    <p>You only need to fill in either weekly, monthly or yearly.</p>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Bill</th>
                    <th>Weekly Cost</th>
                    <th>Monthly Cost</th>
                    <th>Yearly Cost</th>
                    <th>Day of the Month</th>
                </tr>
            </thead> 
            <tbody>
                @if ($bills->count())

                    @foreach ($bills as $item)
                        <tr>
                            <td width='50%'>
                                <a href="#" class="btn-circle btn-danger btn-sm removeRow"><i class="fas fa-times"></i></a>
                                {!! Form::text($item->id.'[name]', $item->name,['class'=>'col-10']) !!}
                            </td>
                            <td>
                                {!! Form::number($item->id.'[weekly]',  $item->weekly, ['class' => 'form-control','step'=>'any']) !!}
                            </td>
                            <td>
                                {!! Form::number($item->id.'[monthly]',  $item->monthly, ['class' => 'form-control','step'=>'any']) !!}
                            </td>
                            <td>
                                {!! Form::number($item->id.'[yearly]',  $item->yearly, ['class' => 'form-control','step'=>'any']) !!}
                            </td>
                            <td>
                                {!! Form::number($item->id.'[dayofmonth]',  $item->dayofmonth, ['class' => 'form-control','step'=>'any']) !!}
                            </td>
                        </tr>

                    @endforeach
            
                @elseif ($items->count())

                    @foreach ($items as $item)
                        <tr>
                            <td width='50%'>
                                <a href="#" class="btn-circle btn-danger btn-sm removeRow"><i class="fas fa-times"></i></a>
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