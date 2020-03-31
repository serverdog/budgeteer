@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Bill Category
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($billCategory, ['route' => ['billCategories.update', $billCategory->id], 'method' => 'patch']) !!}

                        @include('bill_categories.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection