@extends('layouts.app')
@section('pageTitle', 'Add Account')

@section('content')
<div class="header bg-gradient-primary pb-1 pt-1 pt-md-7">
    <div class="container-fluid">
        <div class="header-body">
           
        </div>
    </div>
</div>

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card bg-gradient-info shadow">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="content">
                                @include('adminlte-templates::common.errors')
                                <div class="box box-primary">
                                    <div class="box-body">
                                        <div class="row">
                                            {!! Form::open(['route' => 'accounts.store','class'=>'col-12']) !!}
                                                <div class="row">
                                                    @include('accounts.fields')
                                                </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                                      
@endsection
