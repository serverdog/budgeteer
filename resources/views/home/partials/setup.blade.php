<!-- Content Row -->
<div class="row">
   
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-{!! $setup['accounts'] ? "danger" : "success" !!} shadow h-100 py-2">
                <div class="card-body pt-1">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-{!! $setup['accounts'] ? "danger" : "success" !!} text-uppercase mb-1">
                                1. Setup Accounts

                            </div>
                            <div class="mb-0 text-gray-800">
                                @if($setup['accounts'])
                                    <a href="{!! route('accounts.create') !!}" class="btn btn-danger btn-icon-split btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-flag"></i>
                                        </span>
                                        <span class="text">Setup your accounts</span>
                                    </a>
                                @else
                                    <span class="icon text-success">
                                        <i class="fas fa-check-circle"></i> Complete
                                    </span>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
   

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body pt-1">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="font-weight-bold text-info text-uppercase mb-1">
                            2. Setup Bills


                        </div>
                        <div class="mb-0 text-gray-800">
                            @if($setup['bills'])
                                <a href="{!! route('bills.create') !!}" class="btn btn-danger btn-icon-split btn-sm">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-flag"></i>
                                    </span>
                                    <span class="text">Setup your bills</span>
                                </a>
                            @else
                                <span class="icon text-success">
                                    <i class="fas fa-check-circle"></i> Complete
                                </span>
                            @endif
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body pt-1">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="font-weight-bold text-warning text-uppercase mb-1">
                            3. Define your Income
                        </div>
                        <div class="mb-0 text-success">
                            @if($setup['income'])
                                <a href="{!! route('incomes.create') !!}" class="btn btn-danger btn-icon-split btn-sm">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-flag"></i>
                                    </span>
                                    <span class="text">Setup your Income</span>
                                </a>
                            @else
                                <span class="icon text-success">
                                    <i class="fas fa-check-circle"></i> Complete
                                </span>
                            @endif
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-{!! $setup['balances'] ? "danger" : "success" !!} shadow h-100 py-2">
            <div class="card-body pt-1">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="font-weight-bold text-{!! $setup['balances'] ? "danger" : "success" !!} text-uppercase mb-1">
                            4. Balances
                        </div>
                        <div class="mb-0 text-gray-800">
                            @if($setup['balances'])
                                <a href="{!! route('balances.create') !!}" class="btn btn-danger btn-icon-split btn-sm">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-flag"></i>
                                    </span>
                                    <span class="text">Enter your first Balance</span>
                                </a>
                            @else
                                <span class="icon text-success">
                                    <i class="fas fa-check-circle"></i> Complete
                                </span>
                            @endif
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</div>