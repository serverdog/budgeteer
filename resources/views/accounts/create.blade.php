@extends('layouts.app')
@section('pageTitle', 'Add Account')

@section('content')

@component("card", ["size" => "12 border-dark no-padding card-full" , "title_bg" => "bg-gradient-primary text-gray-100", "title" => "Add Account"])

            {!! Form::open(['route' => 'accounts.store','class'=>'col-12']) !!}
            <div class="row">
                @include('accounts.fields')
            </div>
            {!! Form::close() !!}
@endcomponent

@endsection