@extends('layouts.app')
@section('pageTitle', 'Accounts')

@section('content')
@component("card", ["size" => "12 border-dark no-padding card-full" , "title_bg" => "bg-gradient-primary text-gray-100", "title" => "Registered Accounts"])


    
    <div class="box box-primary">
        <div class="box-body">
            @include('accounts.table')
        </div>
    </div>
    @endcomponent
@endsection