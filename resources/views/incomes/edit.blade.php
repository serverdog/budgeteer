@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Income
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($income, ['route' => ['incomes.update', $income->id], 'method' => 'patch']) !!}

                        @include('incomes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection