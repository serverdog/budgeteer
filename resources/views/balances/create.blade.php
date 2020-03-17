@extends('layouts.app')
@section('pageTitle', 'Add Account')

@section('content')
@component("card", ["size" => "12 border-dark no-padding card-full" , "title_bg" => "bg-gradient-primary text-gray-100", "title" => "Record a new balance"])


    <div class="row">
        {!! Form::open(['route' => 'balances.store']) !!}
        <div class="row">
            @include('balances.fields')
        </div>
        {!! Form::close() !!}
    </div>
@endcomponent
                                      
@endsection
