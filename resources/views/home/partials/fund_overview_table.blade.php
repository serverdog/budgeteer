<div class="col-6 card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Funds Overview</h6>
    </div>
    <div class="card-body">
        @if ($details->count())
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Funds</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category => $data)
                    <tr class='bg-gradient-{{ $category == 'Short Term Liabilities' ? "danger" : "success" }} text-gray-100'>
                        <td>{{ $category }}</td>

                        <td class='text-right'>{{currency_format($data->pluck('amount')->sum(), currency()->getUserCurrency()) }}</td>
                    </tr>

                    @endforeach
                    <tr class='bg-gradient-primary text-gray-100 text-lg'>
                        <td>Cash Available</td>

                        <td class='text-right'>{{currency_format($availableCash, currency()->getUserCurrency()) }}</td>
                    </tr>
                    <tr class='bg-gray-100'>
                        <td>
                            Monthly Incidentals
                            &nbsp; 
                            <span class="btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Approximation of funds used during the month, eg cash withdrawls and purchases, groceries etc.">
                                <i class="fas fa-info-circle"></i>
                            </span>
                            
                        </td>

                        <td class='text-right'>
                            <a href="{!! route('profile.edit') !!}" class="btn-circle btn-sm btn-primary float-left">
                                <span class="icon text-white-50">
                                <i class="fas fa-pen"></i>
                                </span>
                            </a>
                            {{ currency_format($user->incidentals, currency()->getUserCurrency()) }}
                        </td>
                    </tr>   
                    <tr class='bg-gradient-success text-gray-100'>
                        <td>Regular Income</td>

                        <td class='text-right'>
                            @if ($income->count() > 0)
                                {{ currency_format($income->pluck('amount')->sum(), currency()->getUserCurrency()) }}
                            @else 
                            <a href="{!! route('incomes.index') !!}" class="btn btn-danger btn-icon-split btn-sm">
                                <span class="icon text-white-50">
                                  <i class="fas fa-flag"></i>
                                </span>
                                <span class="text">Setup your regular incomes</span>
                              </a>
                            @endif
                        </td>
                    </tr>                                     
                    <tr class='bg-gradient-warning text-gray-100'>
                        <td>Monthly Bills</td>

                        <td class='text-right'>
                            @if ($totalBillsPerMonth > 0)
                                {{ currency_format($totalBillsPerMonth, currency()->getUserCurrency()) }}
                            @else 
                            <a href="{!! route('bills.index') !!}" class="btn btn-danger btn-icon-split btn-sm">
                                <span class="icon text-white-50">
                                  <i class="fas fa-flag"></i>
                                </span>
                                <span class="text">Setup your bills to see this</span>
                              </a>
                            @endif
                        </td>
                    </tr>
                    <tr class='bg-gradient-primary text-gray-100'>
                        @if ($daysFinanced > 0)
                            <td>Sustainability<sup>*</sup> ({{ $daysFinanced }} days)</td>

                            <td class='text-right'>{{ \Carbon\Carbon::now()->addDays($daysFinanced)->toFormattedDateString()}}</td>
                        @else
                            <td>Sustainability</td>

                            <td class='text-right'>
                                <span class="icon">
                                    <i class="fas fa-check-circle"></i> You currently earn more than you spend
                                </span>
                            </td>
                    
                        @endif

                        </tr>
                </tbody>

            </table>
       
        </div>
        @endif
    </div>
  
</div>