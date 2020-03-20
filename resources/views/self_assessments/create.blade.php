@extends('layouts.app')

@section('content')
@component("card", ["size" => "12 border-dark no-padding card-full" , "title_bg" => "bg-gradient-primary text-gray-100",
"title" => "New Self Assessment"])


<div class="row">

    {!! Form::open(['route' => 'selfAssessments.store']) !!}

    @include('self_assessments.fields')

    {!! Form::close() !!}
</div>
@endcomponent
@endsection