@extends('layouts.app')

@section('content')
@component("card", ["size" => "12 border-dark no-padding card-full" , "title_bg" => "bg-gradient-primary text-gray-100",
"title" => "Liability"])


    <div class="row">

        {!! Form::open(['route' => 'liabilities.store']) !!}

        @include('liabilities.fields')

        {!! Form::close() !!}
    </div>
@endcomponent
@endsection