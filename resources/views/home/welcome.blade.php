@extends('layouts.app')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12 text-center">
            <div class="jumbotron  bg-white border">
                <h1 class="display-1 text-primary">eBudget</h1>
                <h4 class="display-5">Know where your budget is and where it's going.</h4>
                <img src="/img/hero.png" class="img-fluid" alt="eBudget Hero image" width="60%"/>
            </div>
        </div>
    </div>
  
    <div class="row">
        @include('home.partials.news_carousel')
    </div>

    <div class="row">
        <div class="col-12">
            <div class="jumbotron bg-white border">
                <div class="row">
                    <div class="col-12 text-center">
                        <h3>Overview</h3>
                    </div>
                    <div class="col-6">
                        <img src="/img/overview.png" class="img-fluid" alt="eBudget overview pane"/>
                    </div>
                    <div class="col-6 p-5 bg-white">
                        
                        <p>eBudget is a household budget planner, ideally suited for people with inconsitent incomes 
                            such as freelancers and the self-employed, to track their available cash and monitor their outgoings.</p>
                        <p>eBudget allows you to quickly see how much money you have immediately available, where your money is located
                            and what bills you have coming up so that you can better plan your outgoings.</p>
                        <p>By entering all your accounts, your income and your bills, eBudget will help you calculate your sustainability
                            on a daily basis so you know when you money is likely to run out. This helps you plan your finances and can help avoid
                        expensive debts.</p>
                            
                    </div>
                </div>                
               
            </div>
        </div>
    </div>
      
    <div class="row">
        <div class="col-12">
            <div class="jumbotron bg-white border">
                <div class="row">
                    <div class="col-12 text-center">
                        <h3>Budgeting</h3>
                    </div>
                    <div class="col-6 p-5">
                        <p>Quickly setup all your accounts, and then update eBudget as often as you can (idealy once a day) to 
                            pick up trends in your finances.</p>
                        <p>This helps you be mindful of debts suchs from credit cards, loans and finance agreements.</p>
                        </div>
                    <div class="col-6">
                        <img src="/img/balances.png" class="img-fluid" alt="eBudget Balance entry"/>
                    </div>
                </div>                
               
            </div>
        </div>
    </div>    


    <div class="row">
        <div class="col-12">
            <div class="jumbotron bg-white border">
                <div class="row">
                    <div class="col-12 text-center">
                        <h3>Outgoings</h3>
                    </div>
                    <div class="col-6">
                        <img src="/img/bills.png" class="img-fluid" alt="eBudget history chart"/>
                    </div>
                    <div class="col-6 p-5 bg-white">
                     
                        <p>Setup our bills and loan repayments so that you have a clearer picture of when and how much you need to set aside
                            each month.</p>
                        <p>This will help calculate a daily running cost for your household which can then be used to forecast
                            how long your current cash assets will support you.</p>

                    </div>
                </div>                
               
            </div>
        </div>
    </div>    



    <div class="row">
        <div class="col-12">
            <div class="jumbotron bg-white border">
                <div class="row">
                    <div class="col-12 text-center">
                        <h3>Trends</h3>
                    </div>
                    <div class="col-6 p-5 bg-white">
                     
                        <p>eBudget tracks your funds over time to help you get a feel for your income and outgoings.</p>
                        <p>This helps you get a feel for whether you are generally saving or spending, and highlights times
                            when funds can be tight, allowing you to prepare.</p>

                    </div>
                    <div class="col-6">
                        <img src="/img/history.png" class="img-fluid" alt="eBudget history chart"/>
                    </div>
                </div>                
               
            </div>
        </div>
    </div>    






</div>
@endsection

@push('js')

@endpush