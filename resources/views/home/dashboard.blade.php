@extends('layouts.app')
@section('title', 'Dashboard')

@push('js')
<script src="/theme/vendor/chart.js/Chart.min.js"></script>
<script type="text/javascript">

window.chartColors = {
	red: 'rgb(255, 99, 132)',
	orange: 'rgb(255, 159, 64)',
	yellow: 'rgb(255, 205, 86)',
	green: 'rgb(75, 192, 192)',
	blue: 'rgb(54, 162, 235)',
	purple: 'rgb(153, 102, 255)',
	grey: 'rgb(201, 203, 207)'
};


</script>
@endpush


@if ($details->count())
    @php
    $categories = collect($details->groupBy('Account.Accounttype.Category.name')->forget(['Long Term Savings', 'Long Term Liabilities']));


    $availableCash = 0;

    $availableCash += $categories->has('Instant Funds') ? $categories->get('Instant Funds')->pluck('amount')->sum() : 0;
    $availableCash += $categories->has('Stashed Cash') ? $categories->get('Stashed Cash')->pluck('amount')->sum() : 0;
    $availableCash -=  $categories->has('Short Term Liabilities') ? $categories->get('Short Term Liabilities')->pluck('amount')->sum() : 0;

    $totalBillsPerMonth = ($bills->pluck('monthlyCost')->sum() ?? 0) ;

    $regularIncome = $income->count() ? $income->pluck('amount')->sum() : 0;
    $monthlyOutgoings = $totalBillsPerMonth + $user->incidentals - $regularIncome;
    $daysFinanced = $monthlyOutgoings > 0 ? round($availableCash / $monthlyOutgoings * 30) : 0;
    if ($daysFinanced < 1) {
        $daysFinanced = 0;
    }
    @endphp
@endif

@if ($bills->count())
    @php
        $luxury = $bills->where('luxury', true);
        $totalBills = $bills->pluck('monthlyCost')->sum()  + $user->incidentals;
        $luxuryBills = $luxury->pluck('monthlyCost')->sum();
        $luxuryBillsPercent = round($luxuryBills / $totalBills * 100);
        $newDaysFinanced = $monthlyOutgoings > 0 ? round($availableCash / ($monthlyOutgoings - $luxuryBills) * 30) : 0;
        $extension = $newDaysFinanced - $daysFinanced;
    @endphp
@endif

@section('content')
    @if($setup->values()->filter()->count())
        @include('home.partials.setup')
    @else
        @include('home.partials.cards')
    @endif


    <div class="row display-flex">

        @include('home.partials.fund_overview_table')
        @include('home.partials.bills_by_type')



        @if ($history->count() > 1)
            @include('home.partials.history_chart')
        @endif
        @include('home.partials.bills_overview')

        @include('home.partials.detail_table')
        {{-- @include('home.partials.funds_by_category_chart') --}}
    </div>

@endsection

