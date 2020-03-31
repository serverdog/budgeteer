@extends('layouts.app')
@section('title', 'Dashboard')

@push('js')
<script src="/theme/vendor/chart.js/Chart.min.js"></script>
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

@section('content')
    @if($setup->values()->filter()->count())
        @include('home.partials.setup')
    @else
        @include('home.partials.cards')
    @endif


    <div class="row">

        @include('home.partials.fund_overview_table')
        @include('home.partials.bills_overview')



        @if ($history->count() > 1)
            @include('home.partials.history_chart')
        @endif
        @include('home.partials.bills_by_type')

        @include('home.partials.detail_table')
        {{-- @include('home.partials.funds_by_category_chart') --}}
    </div>

@endsection

