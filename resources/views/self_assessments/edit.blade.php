@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Self Assessment
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($selfAssessment, ['route' => ['selfAssessments.update', $selfAssessment->id], 'method' => 'patch']) !!}

                        @include('self_assessments.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection