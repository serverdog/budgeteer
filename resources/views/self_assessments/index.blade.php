@extends('layouts.app')

@section('content')

@component("card", ["size" => "12 border-dark no-padding card-full" , "title_bg" => "bg-gradient-primary
text-gray-100","title" => "Self Assessments"])



<div class="clearfix"></div>
<div class="box box-primary">
    <div class="box-body">

        <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
            href="{{ route('selfAssessments.create') }}">Add Assessment</a>


        @include('self_assessments.table')
    </div>
</div>
@endcomponent
@endsection