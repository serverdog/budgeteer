@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Bills
        </h1>
    </section>
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
