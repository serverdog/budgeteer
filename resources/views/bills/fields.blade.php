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
        <?php /* <div class="alert alert-primary col-3" role="alert">
        For this section, please list out any household or regular bills. Do not include any loans or mortgage payments here. 
            Use the <a href='{!! route('liabilities.index') !!}'>Loans</a> section for that.</div>

            <div class="alert alert-primary col-3  offset-md-1" role="alert">
            You only need to fill in either weekly, monthly or yearly.
        </div>
*/?>
        @if (!$bills->count())    
            <div class="alert alert-primary col-4 " role="alert">
                We've got you started with the most common bills, but feel free to remove any that you don't need, 
                or rename them to something that makes sense to you. It will help to have your last months bank statement with
                you to capture all your bills and regular outgoings.</div>
        @else 
            <div class="alert alert-primary col-4" role="alert">
                <i class="fas fa-info-circle"></i>&nbsp; We've listed all the bills you mentioned previously, so you can amend their details, remove them or add new ones.</div>
        @endif
        <div class="alert alert-primary col-4" role="alert">
            <i class="fas fa-info-circle"></i>&nbsp; Luxury items are those bills which you could manage to live without eg: premium TV subscriptions (if you are out of contract), 
            music service subscriptions etc.</div>

        
    
    <div class="col-12" id="billsGrid">
        <div class="row mb-1">
            <div class="col-3 h4">
                Bill
            </div>
            <div class="col-2 h4">
                Type
            </div>
            <div class="col-1 h5">
                Luxury
            </div>
            <div class="col-2 h4">
                Period
            </div>
            <div class="col-2 h4">
                Amount
            </div>
            <div class="col-2 h4">
                When
            </div>
        </div>
        @if ($bills->count())
            @foreach ($bills as $item)
                <div class="row billRow mb-1" id="bill-{{$item->id}}">
                    <div class="col-3">
                        <a href="#" class="btn-circle btn-danger btn-sm removeRow float-left mr-2"><i class="fas fa-times"></i></a>
                        {!! Form::text($item->id.'[name]', $item->name,['class'=>'form-control col-10']) !!}
                    </div>
                    <div class="col-2" >
                        {!! Form::select($item->id.'[bill_category_id]', $categories, $item->bill_category_id, ['class' => 'form-control','placeholder'=>'Other']) !!}
                    </div>
                    <div class="col-1">
                        {!! Form::checkbox($item->id.'[luxury]', true, $item->luxury,['class'=>'form-control col-2 ml-4']) !!}
                    </div>
                    <div class="col-2">
                        {!! Form::select($item->id.'[period]', $periods , $item->period, ['class' => 'form-control col-8 periodPicker', 'id'=>$item->id]) !!}
                    </div>
                    <div class="col-2 weekly"  style="display:none">
                        {!! Form::number($item->id.'[weekly]',  $item->weekly, ['class' => 'form-control','step'=>'any','placeholder'=>'Weekly Cost']) !!}
                    </div>
                    <div class="col-2 monthly">
                        {!! Form::number($item->id.'[monthly]',  $item->monthly, ['class' => 'form-control','step'=>'any','placeholder'=>'Monthly Cost']) !!}
                    </div>
                    <div class="col-2 yearly"  style="display:none">
                        {!! Form::number($item->id.'[yearly]',  $item->yearly, ['class' => 'form-control','step'=>'any','placeholder'=>'Yearly Cost']) !!}
                    </div>
                    <div class="col-2  weekly" style="display:none">
                        {!! Form::select($item->id.'[weekday]', $daysofweek, $item->weekday, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-2 monthly">
                        {!! Form::select($item->id.'[dayofmonth]', $daysofmonth, $item->dayofmonth, ['class' => 'form-control col-12']) !!}
                    </div>
                    <div class="col-2 yearly"  style="display:none">
                        {!! Form::date($item->id.'[date]', $item->date, ['class' => 'form-control datepicker col-12']) !!}
                    </div>
                </div>
            @endforeach
        @else
            @foreach ($items as $item)
                <div class="row mb-1  billRow" id="bill-{{$item->id}}">
                    <div class="col-3">
                        <a href="#" class="btn-circle btn-danger btn-sm removeRow float-left mr-2"><i class="fas fa-times"></i></a>
                        {!! Form::text($item->id.'[name]', $item->name,['class'=>'form-control col-10']) !!}
                    </div>
                    <div class="col-1">
                        {!! Form::checkbox($item->id.'[luxury]', true, null,['class'=>'form-control col-2 ml-4']) !!}
                    </div>
                    <div class="col-2">
                        {!! Form::select($item->id.'[period]', $periods , "Monthly", ['class' => 'form-control col-8 periodPicker', 'id'=>$item->id]) !!}
                    </div>
                    <div class="col-2 weekly"  style="display:none">
                        {!! Form::number($item->id.'[weekly]',  null, ['class' => 'form-control','step'=>'any','placeholder'=>'Weekly Cost']) !!}
                    </div>
                    <div class="col-2 monthly">
                        {!! Form::number($item->id.'[monthly]',  null, ['class' => 'form-control','step'=>'any','placeholder'=>'Monthly Cost']) !!}
                    </div>
                    <div class="col-2 yearly"  style="display:none">
                        {!! Form::number($item->id.'[yearly]',  null, ['class' => 'form-control','step'=>'any','placeholder'=>'Yearly Cost']) !!}
                    </div>
                    <div class="col-2  weekly" style="display:none">
                        {!! Form::select($item->id.'[weekday]', $daysofweek, null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-2 monthly">
                        {!! Form::select($item->id.'[dayofmonth]', $daysofmonth, null, ['class' => 'form-control col-6']) !!}
                    </div>
                    <div class="col-2 yearly"  style="display:none">
                        {!! Form::date($item->id.'[date]', now(), ['class' => 'form-control datepicker col-12']) !!}
                    </div>
                </div>
            @endforeach
        @endif
       
    </div>
    <span class="btn btn-success btn-sm float-left mr-2" id="addRow"><i class="fas fa-plus"></i> Add Row</span>
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('bills.index') }}" class="btn btn-default">Cancel</a>
    </div>

@endcomponent
    
@push('js')
<script type="text/javascript">
(function($) {


  "use strict"; // Start of use strict

    function addRow() 
    {
        var row =  $("#billsGrid").children().length * 100;

        var newRow = '<div class="row mb-1 billRow" id="bill-'+row+'">'+
                '      <div class="col-3">'+
                '          <a href="#" class="btn-circle btn-danger btn-sm removeRow float-left mr-2"><i class="fas fa-times"></i></a>'+
                '          <input class="form-control col-10" name="'+row+'[name]" type="text" placeholder="New bill name">'+
                '      </div>'+
                '        <div class="col-1">'+
                '            <input class="form-control col-2 ml-4" name="'+row+'[luxury]" type="checkbox" value="1">'+
                '        </div>'+
                '      <div class="col-2">'+
                '          <select class="form-control col-8 periodPicker" id="'+row+'" name="'+row+'[period]">'+
                '              <option value="Weekly">Weekly</option>'+
                '              <option value="Monthly" selected="selected">Monthly</option>'+
                '              <option value="Yearly">Yearly</option>'+
                '          </select>'+
                '      </div>'+
                '      <div class="col-2 weekly" style="display:none">'+
                '          <input class="form-control" step="any" name="'+row+'[weekly]" type="number" placeholder="Weekly Cost">'+
                '      </div>'+
                '      <div class="col-2 monthly">'+
                '          <input class="form-control" step="any" placeholder="Monthly Cost" name="'+row+'[monthly]" type="number">'+
                '      </div>'+
                '      <div class="col-2 yearly" style="display:none">'+
                '          <input class="form-control" step="any" name="'+row+'[yearly]"  placeholder="Yearly Cost" type="number">'+
                '      </div>'+
                '      <div class="col-2  weekly" style="display:none">'+
                '          <select class="form-control" name="'+row+'[weekday]">'+
                '          <option value="1">Mon</option>'+
                '          <option value="2">Tue</option>'+
                '          <option value="3">Wed</option>'+
                '          <option value="4">Thu</option>'+
                '          <option value="5">Fri</option>'+
                '          <option value="6">Sat</option>'+
                '          <option value="7">Sun</option></select>'+
                '      </div>'+
                '      <div class="col-2 monthly">'+
                '          <select class="form-control col-6" name="'+row+'[dayofmonth]">'+
                '              <option value="1">1st</option>'+
                '              <option value="2">2nd</option>'+
                '              <option value="3">3rd</option>'+
                '              <option value="4">4th</option>'+
                '              <option value="5">5th</option>'+
                '              <option value="6">6th</option>'+
                '              <option value="7">7th</option>'+
                '              <option value="8">8th</option>'+
                '              <option value="9">9th</option>'+
                '              <option value="10">10th</option>'+
                '              <option value="11">11th</option>'+
                '              <option value="12">12th</option>'+
                '              <option value="13">13th</option>'+
                '              <option value="14">14th</option>'+
                '              <option value="15">15th</option>'+
                '              <option value="16">16th</option>'+
                '              <option value="17">17th</option>'+
                '              <option value="18">18th</option>'+
                '              <option value="19">19th</option>'+
                '              <option value="20">20th</option>'+
                '              <option value="21">21st</option>'+
                '              <option value="22">22nd</option>'+
                '              <option value="23">23rd</option>'+
                '              <option value="24">24th</option>'+
                '              <option value="25">25th</option>'+
                '              <option value="26">26th</option>'+
                '              <option value="27">27th</option>'+
                '              <option value="28">28th</option>'+
                '              <option value="29">29th</option>'+
                '              <option value="30">30th</option>'+
                '              <option value="31">31st</option>'+
                '          </select>'+
                '          </div>'+
                '          <div class="col-2 yearly" style="display:none">'+
                '              <input class="form-control datepicker col-12" name="'+row+'[date]" type="date" value="2020-03-27">'+
                '          </div>'+
                '    </div>';
        $('#billsGrid').append(newRow);    
        $('.periodPicker').unbind().on('change', function(e){
            var period = $(this).val().toLowerCase();
            var rowID = "#bill-"+$(this).attr('id');
            $(rowID+" .weekly, "+rowID+" .monthly, "+rowID+" .yearly").hide();
            $(rowID+" ."+period).show();
        });
    }


  $(document).on('click', '.removeRow', function(e){
        e.preventDefault();
        $(this).closest(".row").remove();
    });
    $('.periodPicker').on('change', function(e){
        var period = $(this).val().toLowerCase();
        var rowID = "#bill-"+$(this).attr('id');
        $(rowID+" .weekly, "+rowID+" .monthly, "+rowID+" .yearly").hide();
        $(rowID+" ."+period).show();
    })
  


    $(document).on('click', '#addRow', function(e){
        e.preventDefault();
        addRow();
    });

    $('.billRow').each(function(row){
        var period = $(this).find('.periodPicker').val().toLowerCase();
        var rowID="#"+$(this).attr('id');
        console.log(rowID, period);
        $(rowID+" .weekly, "+rowID+" .monthly, "+rowID+" .yearly").hide();
        $(rowID+" ."+period).show();
    })
   

})(jQuery); // End of use strict

</script>
@endpush