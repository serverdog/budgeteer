<div class="col-6 card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Funds Overview</h6>
    </div>
    <div class="card-body">
        @if ($details->count())
        @php
        $categories = collect($details->groupBy('Account.Accounttype.Category.name')->forget(['Long Term Savings', 'Long Term Liabilities']));
       

        $availableCash = 0;

        $availableCash += $categories->has('Instant Funds') ? $categories->get('Instant Funds')->pluck('amount')->sum() : 0;
        $availableCash += $categories->has('Stashed Cash') ? $categories->get('Stashed Cash')->pluck('amount')->sum() : 0;
        $availableCash -=  $categories->has('Short Term Liabilities') ? $categories->get('Short Term Liabilities')->pluck('amount')->sum() : 0;

        $totalBillsPerMonth = ($bills->pluck('monthlyCost')->sum() ?? 0) ;

        $regularIncome = $income->count() ? $income->pluck('amount')->sum() : 0;
        $monthlyOutgoings = $totalBillsPerMonth + $user->incidentals - $regularIncome;
        $daysFinanced = ($totalBillsPerMonth + $user->incidentals) > 0 ? round($availableCash / $monthlyOutgoings * 30) : 0;
        @endphp

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

                        <td class='text-right'>&pound;{{format($data->pluck('amount')->sum())}}</td>
                    </tr>

                    @endforeach
                    <tr class='bg-gradient-primary text-gray-100 text-lg'>
                        <td>Cash Available</td>

                        <td class='text-right'>&pound;{{format($availableCash )}}</td>
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
                            &pound;{{format($user->incidentals )}}
                        </td>
                    </tr>   
                    <tr class='bg-gradient-success text-gray-100'>
                        <td>Regular Income</td>

                        <td class='text-right'>
                            @if ($income->count() > 0)
                                &pound;{{format($income->pluck('amount')->sum())}}
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
                                &pound;{{format($totalBillsPerMonth)}}
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
                        <td>Sustainability<sup>*</sup> ({{ $daysFinanced }} days)</td>

                    <td class='text-right'>{{ \Carbon\Carbon::now()->addDays($daysFinanced)->toFormattedDateString()}}</td>
                    </tr>
                </tbody>

            </table>
            <sup>*</sup> If all your income stopped today, and your outgoings remained the same, how many days coud you support yourself. Excludes future income and unexpected costs
        </div>
        @endif
    </div>
  
</div>