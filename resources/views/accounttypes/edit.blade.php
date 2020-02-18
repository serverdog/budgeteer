@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Accounttype
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($accounttype, ['route' => ['accounttypes.update', $accounttype->id], 'method' => 'patch']) !!}

                        @include('accounttypes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection