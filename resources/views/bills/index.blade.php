@extends('layouts.app')
@section('pageTitle', 'Bills')

@push('js')
<script src="/theme/vendor/chart.js/Chart.min.js"></script>
@endpush

@section('content')



    @include('bills.partials.bills_graph')

    @component("card", ["size" => "12 border-dark no-padding card-full" , "title_bg" => "bg-gradient-primary text-gray-100","title" => "Bills"])



        <div class="box box-primary">
            <div class="box-body">
                <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
                    href="{{ route('bills.create') }}">Configure</a>

                @include('bills.table')
            </div>
        </div>

    @endcomponent
@endsection