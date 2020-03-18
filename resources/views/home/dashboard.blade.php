@extends('layouts.app')
@section('title', 'Dashboard')

@push('js')
<script src="/theme/vendor/chart.js/Chart.min.js"></script>
@endpush

@section('content')
    @include('home.partials.cards')

    <div class="row">

        @include('home.partials.fund_overview_table')
        @include('home.partials.funds_by_category_chart')

        @include('home.partials.history_chart')

        @include('home.partials.detail_table')
    </div>

@endsection

