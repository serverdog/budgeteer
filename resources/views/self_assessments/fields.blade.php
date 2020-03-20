
<div class="row">
    @component("card", ["size" => "12 border-dark no-padding card-full" , "title_bg" => "bg-gradient-info text-gray-100",
    "title" => "Details"])

        <div class="row">

            <!-- Year Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('year', 'Year:') !!}
                {!! Form::select('year', $years, null, ['class' => 'form-control']) !!}
            </div>
            <!-- Total Dividends Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('total_dividends', 'Total Dividends:') !!}
                {!! Form::number('total_dividends', null, ['class' => 'form-control','id'=>'totalDividends']) !!}
            </div>
            <div class="form-group col-sm-6">
                If dividends are shared from one company, enter the total amount of dividends issued here, and then allocate the share to the different people below. the dividends will automatically be distributed. Otherwise leave this blank and allocated 100% to the share below.
            </div>
        </div>
       
    <table class='table table-striped' id='inputTable'>
        <thead>
            <tr>
                <th>&nbsp;</th>
                <th>Name</th>
                <th>Salary</th>
                <th>Savings interest</th>
                <th>Other Income</th>
                <th>Payment on Account (July)</th>
                <th>Share of dividends</th>
                <th>Dividends received</th>
                <th>Estimated tax</th>
            </tr>
        </thead>
        <tbody>
            <tr class='dividendRow' id='row1'>
                <td> 
                    <a href="#" class="btn-circle btn-danger btn-sm removeRow float-left mr-2"><i class="fas fa-times"></i></a>
                    <span class="btn-circle btn-info btn-sm float-left mr-2 details"><i class="fas fa-eye"></i></span>
                </td>
                <td>
                    {!! Form::text('0.[name', null, ['class' => 'form-control']) !!}
                </td>
                <td>{!! Form::number('0.[salary]', null, ['class' => 'form-control salary','step'=>'any']) !!}</td>
                <td>{!! Form::number('0.[savings]', null, ['class' => 'form-control savings','step'=>'any']) !!}</td>
                <td>{!! Form::number('0.[other]', null, ['class' => 'form-control other','step'=>'any']) !!}</td>
                <td>{!! Form::number('0.[july_payment]', null, ['class' => 'form-control payment','step'=>'any']) !!}</td>
                <td>{!! Form::number('0.[share]', null, ['class' => 'form-control share','step'=>'any']) !!}</td>
                <td>{!! Form::number('0.[dividend_amount]', null, ['class' => 'form-control dividend','step'=>'any']) !!}</td>
                <td>{!! Form::number('0.[tax]', null, ['class' => 'form-control tax','step'=>'any']) !!}</td>
                
            </tr>
        </tbody>
    </table>
    <span class="btn btn-success btn-sm float-left mr-2" id="addRow"><i class="fas fa-plus"></i> Add Row</span>
    

   
    @endcomponent
    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('selfAssessments.index') }}" class="btn btn-default">Cancel</a>
    </div>
</div>


@component("card", ["size" => "12 border-dark no-padding card-full" , "title_bg" => "bg-gradient-primary text-gray-100",
"title" => "Breakdown"])
    <div class="text-right">
        <div class="row h5">
            <div class="col-3"></div>
            <div class="col-3 bg-gradient-success text-gray-100">Earnings</div>
            <div class="col-3 bg-gradient-info text-gray-100">Dividend</div>
            <div class="col-3 bg-gradient-primary text-gray-100">Total Income</div>
        </div>
        <div class="row">
            <div class="col-3"><em>Incomes</em></div>
            <div class="col-3 bg-gradient-success text-gray-100" id='totalIncomeNonDividend'></div>
            <div class="col-3 bg-gradient-info text-gray-100" id='totalIncomeDividend'></div>
            <div class="col-3 bg-gradient-primary text-gray-100" id='totalIncome'></div>
        </div>
        <div class="row">
            <div class="col-3"><em>Less PA (£12,500)</em></div>
            <div class="col-3 bg-gradient-success text-gray-100" id='nonDividendLessPA'></div>
            <div class="col-3 bg-gradient-info text-gray-100" id='DividendLessPA'></div>
            <div class="col-3 bg-gradient-primary text-gray-100" id='LessPA'></div>
        </div>
        <div class="row">
            <div class="col-3"><em>Taxable</em></div>
            <div class="col-3 bg-gradient-success text-gray-100" id='nonDividendTaxable'></div>
            <div class="col-3 bg-gradient-info text-gray-100" id='DividendTaxable'></div>
            <div class="col-3 bg-gradient-primary text-gray-100" id='Taxable'></div>
        </div>
    </div>

    <table class='table table-striped text-right col-10 offset-md-2'>
        <thead>
            <tr>
                <th>Detail</th>
                <th>Amount</th>
                <th>Tax</th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
               <td>Interest (0% up to £3k)</td>                
               <td id='InterestEarned'></td>                
               <td id='InterestTax' class='taxTotals'>£0</td>                
            </tr>
            <tr>
                <td>Earnings Basic Rate (20% for £37.5k)</td>                
                <td id='basicIncomeAllowance'></td>                
                <td id='basicIncomeTax' class='taxTotals'></td>                
             </tr>
             <tr>
                <td>Earnings Higher Rate (40% for £112.5k)</td>                
                <td id='higherIncomeAllowance'></td>                
                <td id='higherIncomeTax' class='taxTotals'></td>                
             </tr>

             <tr>
                <td>Dividends (0% up to £2k)</td>                
                <td id='freeDividendAllowance'></td>                
                <td id='freeDividendTax' class='taxTotals'>£0</td>                
             </tr>
             <tr>
                 <td>Dividends Basic Rate (7.5% for £35.5k)</td>                
                 <td id='basicDividendAllowance'></td>                
                 <td id='basicDividendTax' class='taxTotals'></td>                
              </tr>
              <tr>
                 <td>Dividends Higher Rate (32.5% for £112.5k)</td>                
                 <td id='higherDividendAllowance'></td>                
                 <td id='higherDividendTax' class='taxTotals'></td>                
              </tr>             
         </tbody>
    </table>    
@endcomponent    

@push('js')

<script type="text/javascript">
var rowCount = $('table tbody tr').length,
    taxBands = {12500 : 0, 50000 : 20, 150000 : 40, 999999999 : 45},
    currency = "£",
    PA = 12500.0,
    BasicRate = 37500,
    HigherRate = 112500,
    dividendBands = {2000 : 0, 35500 : 7.5, }
function addRow(){
    rowCount+=1;
    var rowID = rowCount;
    var row = '<tr class="dividendRow"  id="row'+rowID+'"'+
        '<td> <a href="#" class="btn-circle btn-danger btn-sm removeRow float-left mr-2"><i class="fas fa-times"></i></a></td>'+
        '<td>'+
        '    <input class="form-control" name="'+rowID+'.[name" type="text">'+
        '</td>'+
        '<td><input class="form-control salary" step="any" name='+rowID+'.[salary]" type="number"></td>'+
        '<td><input class="form-control savings" step="any" name="'+rowID+'.[savings]" type="number"></td>'+
        '<td><input class="form-control other" step="any" name="'+rowID+'.[other]" type="number"></td>'+
        '<td><input class="form-control payment" step="any" name="'+rowID+'.[july_payment]" type="number"></td>'+
        '<td><input class="form-control share" step="any" name="'+rowID+'.[share]" type="number"></td>'+
        '<td><input class="form-control dividend" step="any" name="'+rowID+'.[dividend_amount]" type="number"></td>'+
        '<td><input class="form-control tax" step="any" name="'+rowID+'.[tax]" type="number"></td>'+
        '</tr>';
    $('table tbody').append(row);    
}
    
function format(number)
{
    return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'GBP' }).format(number)
}


    (function($) {
        "use strict"; // Start of use strict
        $(document).on('click', '.removeRow', function(e){
                e.preventDefault();
                $(this).closest("tr").remove();
            });


        $(document).on('click', '#addRow', function(e){
            e.preventDefault();
            addRow();
        });
        
        $('.dividendRow .share, #totalDividends').on('change', function(){
            var total = $('#totalDividends').val();
            
            $('table#inputTable tbody tr.dividendRow').each(function(row){
                var share = parseInt($(this).find('input.share').val());
                if (share != '' && total != ''){
                    $(this).find('input.dividend').val(total / 100 * share);
                }
                
            });
        });

        $('.dividendRow input').on('change', function(){
            var rowID     = $(this).closest('tr').attr('id'),
                
                salary    = parseFloat($('#'+rowID+' input.salary').val() || 0),
                savings   = parseFloat($('#'+rowID+' input.savings').val() || 0),
                other     = parseFloat($('#'+rowID+' input.other').val() || 0),
                dividends = parseFloat($('#'+rowID+' input.dividend').val() || 0),
                nonDivsTotal = (salary + savings + other),
                earningsExSavings = salary + other,
                total     = salary + savings + other + dividends;
            $('#totalIncomeNonDividend').html(format(nonDivsTotal)).attr('data-value',nonDivsTotal);
            $('#totalIncomeDividend').html(format(dividends)).attr('data-value',dividends);
            $('#totalIncome').html(format(total)).attr('data-value',total);

            //If the income > personal allowance, use all the personal allowance on income
            //and none on dividends
            if (PA - nonDivsTotal < 0){
                $('#nonDividendLessPA').html(format(PA)).attr('data-value',PA);
                $('#DividendLessPA').html(format(0)).attr('data-value',0);
                
            //Use up the income from the personal allowance
            //and what is left over on dividends
            } else {
                $('#nonDividendLessPA').html(format(nonDivsTotal)).attr('data-value',nonDivsTotal);
                var remainingPA = PA - nonDivsTotal;
                if (remainingPA - dividends > 0){
                    $('#DividendLessPA').html(format(dividends)).attr('data-value',dividends);
                } else {
                    $('#DividendLessPA').html(format(remainingPA)).attr('data-value',remainingPA);
                }
            }
            var totalPAReduction = parseFloat($('#DividendLessPA').attr('data-value')) +  parseFloat($('#nonDividendLessPA').attr('data-value')),
                nonDividendTaxable = parseFloat($('#totalIncomeNonDividend').attr('data-value')) -  parseFloat($('#nonDividendLessPA').attr('data-value')),
                DividendTaxable = parseFloat($('#totalIncomeDividend').attr('data-value')) -  parseFloat($('#DividendLessPA').attr('data-value')),
                Taxable = parseFloat($('#totalIncome').attr('data-value')) -  parseFloat($('#nonDividendLessPA').attr('data-value')) -  parseFloat($('#DividendLessPA').attr('data-value'));

            $('#LessPA').html(format(totalPAReduction)).attr('data-value',totalPAReduction);
            $('#nonDividendTaxable').html(format(nonDividendTaxable)).attr('data-value',nonDividendTaxable);
            $('#DividendTaxable').html(format(DividendTaxable)).attr('data-value',DividendTaxable);
            $('#Taxable').html(format(Taxable)).attr('data-value',Taxable);


            /**
             * Interest
             */
            if (savings < 3000){
                $('#InterestEarned').html(format(savings)).attr('data-value',savings);
            } else {
                $('#InterestEarned').html(format(3000)).attr('data-value',3000);
                earningsExSavings += (savings - 3000)

            }
                
            /**
             * Earnings
             * 
             * */
             if (earningsExSavings <= PA) {
                $('#basicIncomeAllowance').html(format(0)).attr('data-value',0);
                $('#basicIncomeTax').html(format(0)).attr('data-value',0);
            }
            earningsExSavings = earningsExSavings - PA;
            if (earningsExSavings <= 37500) {
                var allowance = earningsExSavings,
                    tax = earningsExSavings * 0.2;
                earningsExSavings = 0;
            } else {
                var allowance = 37500,
                    tax = 37500 * 0.2;
                earningsExSavings -= 37500;
            }
            $('#basicIncomeAllowance').html(format(allowance)).attr('data-value',allowance);
            $('#basicIncomeTax').html(format(tax)).attr('data-value',tax);
             
            if (earningsExSavings <= 112500) {
                var allowance = earningsExSavings,
                    tax = earningsExSavings * 0.4;
                earningsExSavings = 0;
            } else {
                var allowance = 112500,
                    tax = 112500 * 0.4;
                earningsExSavings -= 112500;
            }

            $('#higherIncomeAllowance').html(format(allowance)).attr('data-value',allowance);
            $('#higherIncomeTax').html(format(tax)).attr('data-value',tax);

            
                
            /**
             * Dividends
             * 
             * */
            var taxableDividends = parseFloat($('#DividendTaxable').attr('data-value'));
            console.log('Dividends needing tax',taxableDividends)
             if (taxableDividends <= 0) {
                $('#freeDividendAllowance').html(format(0)).attr('data-value',0);
                $('#freeDividendTax').html(format(0)).attr('data-value',0);
            } 
            
            if (taxableDividends <= 2000) {
                var allowance = taxableDividends,
                    tax = taxableDividends * 0;
                    taxableDividends = 0;
            } else {
                var allowance = 2000,
                    tax = 2000 * 0;
                    taxableDividends -= 2000;
            }
            $('#freeDividendAllowance').html(format(allowance)).attr('data-value',allowance);
            $('#freeDividendTax').html(format(tax)).attr('data-value',tax);

            
            if (taxableDividends <= 7500) {
                var allowance = taxableDividends,
                    tax = taxableDividends * 0.075;
                    taxableDividends = 0;
            } else {
                var allowance = 7500,
                    tax = 7500 * 0.075;
                    taxableDividends -= 7500;
            }
            $('#basicDividendAllowance').html(format(allowance)).attr('data-value',allowance);
            $('#basicDividendTax').html(format(tax)).attr('data-value',tax);
             
            //(32.5% for £112.5k)
            if (taxableDividends <= 112500) {
                var allowance = taxableDividends,
                    tax = taxableDividends * 0.325;
                    taxableDividends = 0;
            } else {
                var allowance = 112500,
                    tax = 112500 * 0.325;
                    taxableDividends -= 112500;
            }

            $('#higherDividendAllowance').html(format(allowance)).attr('data-value',allowance);
            $('#higherDividendTax').html(format(tax)).attr('data-value',tax);

            
                    
        });

        

        })(jQuery); // End of use strict

    </script>
@endpush