@extends('layouts.app')
@section('pageTitle', 'Accounts')

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
            <div class="card bg-gradient-primary shadow">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <section class="content-header">
                               
                                <h1 class="pull-right">
                                <a class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('balances.create') }}">Add New</a>
                                </h1>
                            </section>
                            <div class="content">
                                <div class="clearfix"></div>

                                @include('flash::message')

                                <div class="clearfix"></div>
                                <div class="box box-primary">
                                    <div class="box-body">
                                        @include('balances.table')
                                    </div>
                                </div>
                                <div class="text-center">
                                
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

