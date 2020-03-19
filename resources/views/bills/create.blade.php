@extends('layouts.app')

@section('content')

    <div class="content">
       
        <div class="box box-primary">
            <div class="box-body">
                    {!! Form::open(['route' => 'bills.store']) !!}
                    <div class="row">
                        @include('bills.fields')
                    </div>
                    {!! Form::close() !!}
               
            </div>
        </div>
    </div>
@endsection
