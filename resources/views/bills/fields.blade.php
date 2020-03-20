@php

    $periods = ['Weekly', 'Monthly', 'Yearly'];
    $periods = array_combine($periods, $periods);

    $numberFormatter = new NumberFormatter('en_US', NumberFormatter::ORDINAL);
    $daysofmonth = collect(range(1,31))->mapWithKeys(function ($value) use($numberFormatter) {
        return [$value => $numberFormatter->format($value)];
    });
    $daysofweek = collect(range(1,7))->mapWithKeys(function ($value)  {
        return [$value => jddayofweek($value -1, 2)];
    });
    
@endphp

@component("card", ["size" => "12 border-dark no-padding card-full" , "title_bg" => "bg-gradient-success text-gray-100", "title" => "Household Bills"])
    <div class="row  justify-content-center">
        <div class="alert alert-primary col-3" role="alert">
        For this section, please list out any household or regular bills. Do not include any loans or mortgage payments here. 
            Use the <a href='{!! route('liabilities.index') !!}'>Loans</a> section for that.</div>

        @if (!$bills->count())    
            <div class="alert alert-primary col-3  offset-md-1" role="alert">
                We've got you started with the most common bills, but feel free to remove any that you don't need, 
                or rename them to something that makes sense to you.</div>
        @else 
            <div class="alert alert-primary col-3  offset-md-1" role="alert">
            We've listed all the bills you mentioned previously, so you can amend their details, remove them or add new ones.</div>
        @endif

        <div class="alert alert-primary col-3  offset-md-1" role="alert">
            You only need to fill in either weekly, monthly or yearly.
        </div>
    
    <div class="col-12">
        <div class="row mb-1">
            <div class="col-4 h4">
                Bill
            </div>
            <div class="col-2 h4">
                Period
            </div>
            <div class="col-3 h4">
                Amount
            </div>
            <div class="col-3 h4">
                When
            </div>
        </div>
        @foreach ($items as $item)
            <div class="row mb-1" id="bill-{{$item->id}}">
                <div class="col-4">
                    <a href="#" class="btn-circle btn-danger btn-sm removeRow float-left mr-2"><i class="fas fa-times"></i></a>
                    {!! Form::text($item->id.'[name]', $item->name,['class'=>'form-control col-10']) !!}
                </div>
                <div class="col-2">
                    {!! Form::select($item->id.'[period]', $periods , "Monthly", ['class' => 'form-control col-8 periodPicker', 'id'=>$item->id]) !!}
                </div>
                <div class="col-3 weekly"  style="display:none">
                    {!! Form::number($item->id.'[weekly]',  null, ['class' => 'form-control','step'=>'any']) !!}
                </div>
                <div class="col-3 monthly">
                    {!! Form::number($item->id.'[monthly]',  null, ['class' => 'form-control','step'=>'any','placeholder'=>'Monthly Cost']) !!}
                </div>
                <div class="col-3 yearly"  style="display:none">
                    {!! Form::number($item->id.'[yearly]',  null, ['class' => 'form-control','step'=>'any']) !!}
                </div>
                <div class="col-3  weekly" style="display:none">
                    {!! Form::select($item->id.'[weekday]', $daysofweek, null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-3 monthly">
                    {!! Form::select($item->id.'[dayofmonth]', $daysofmonth, null, ['class' => 'form-control col-6']) !!}
                </div>
                <div class="col-3 yearly"  style="display:none">
                    {!! Form::date($item->id.'[date]', now(), ['class' => 'form-control datepicker col-12']) !!}
                </div>
            </div>
        @endforeach

        <?php /*
                @if ($bills->count())

                    @foreach ($bills as $item)
                        <tr>
                            <td width='40%'>
                                <a href="#" class="btn-circle btn-danger btn-sm removeRow"><i class="fas fa-times"></i></a>
                                {!! Form::text($item->id.'[name]', $item->name,['class'=>'col-10']) !!}
                            </td>
                            <td>
                                {!! Form::select('period', $periods , null, ['class' => 'form-control','step'=>'any']) !!}
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
                                {!! Form::select('period', $periods , "monthly", ['class' => 'form-control']) !!}
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
                                {!! Form::number($item->id.'[dayofmonth]', null, ['class' => 'form-control']) !!}
                            </td>
                        </tr>

                    @endforeach
                @endif
            </tbody>
        </table>
        */?>
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
        $(this).closest(".row").remove();
    });
    $('.periodPicker').on('change', function(e){
        var period = $(this).val().toLowerCase();
        console.log($(this).attr('id'), period);
        var rowID = "#bill-"+$(this).attr('id');
        $(rowID+" .weekly, "+rowID+" .monthly, "+rowID+" .yearly").hide();
        $(rowID+" ."+period).show();
    })
   // $('.datepicker').datepicker();
})(jQuery); // End of use strict

</script>
@endpush