@extends('layouts.app')

@section('content')

@component("card", ["size" => "12 border-dark no-padding card-full" , "title_bg" => "bg-gradient-primary text-gray-100","title" => "Regular Income"])



<div class="box box-primary">
    <div class="box-body">
        <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
            href="{{ route('incomes.create') }}">Add Regular Income</a>

        
                    @include('incomes.table')
            </div>
        </div>
@endcomponent
@endsection

