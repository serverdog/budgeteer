@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Liability
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($liability, ['route' => ['liabilities.update', $liability->id], 'method' => 'patch']) !!}

                        @include('liabilities.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection