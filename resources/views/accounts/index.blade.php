@extends('layouts.app')
@section('pageTitle', 'Accounts')

@section('content')
@component("card", ["size" => "12 border-dark no-padding card-full" , "title_bg" => "bg-gradient-primary text-gray-100", "title" => "Registered Accounts"])


    
    <div class="box box-primary">
        <div class="box-body">
            <a class="btn btn-success float-right" style="margin-top: -10px;margin-bottom: 5px"
                    href="{{ route('accounts.create') }}">Add Account</a>
        <a class="btn btn-primary" style="margin-top: -10px;margin-bottom: 5px"
                    href="{{ route('balances.create') }}">Submit Balances</a>
            @include('accounts.table')
        </div>
    </div>
    @endcomponent
@endsection