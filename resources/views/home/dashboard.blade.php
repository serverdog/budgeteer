@extends('layouts.app')
@section('title', 'Dashboard')

@push('js')
<script src="/theme/vendor/chart.js/Chart.min.js"></script>
@endpush

@section('content')
    @if($setup->values()->filter()->count())
        @include('home.partials.setup')
    @else
        @include('home.partials.cards')
    @endif


    <div class="row">

        @include('home.partials.fund_overview_table')
        @include('home.partials.funds_by_category_chart')
        @if ($history->count())
            @include('home.partials.history_chart')
        @endif

        @include('home.partials.detail_table')
    </div>

@endsection

