@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Dwelling
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dwelling, ['route' => ['dwellings.update', $dwelling->id], 'method' => 'patch']) !!}

                        @include('dwellings.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection