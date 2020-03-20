@extends('layouts.app')
@section('pageTitle', 'Loans and Finance')

@section('content')

    @component("card", ["size" => "12 border-dark no-padding card-full" , "title_bg" => "bg-gradient-primary text-gray-100","title" => "Loans and Finance"])


        <div class="box box-primary">
            <div class="box-body">

                <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
                    href="{{ route('loans.create') }}">Configure</a>

                @include('liabilities.table')
            </div>
        </div>


    @endcomponent
@endsection