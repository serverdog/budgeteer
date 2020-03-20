@extends('layouts.app')

@section('content')
@component("card", ["size" => "12 border-dark no-padding card-full" , "title_bg" => "bg-gradient-primary text-gray-100", "title" => "Record a new income"])


    <div class="row">
    
        {!! Form::open(['route' => 'incomes.store']) !!}

            @include('incomes.fields')

        {!! Form::close() !!}
    </div>
@endcomponent
@endsection
