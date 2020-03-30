<!-- Content Row -->
<div class="row">
  @php
  $finances = $funds->pluck('total', 'name');

  @endphp
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body pt-1">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Cash Available 
                &nbsp; <span class="btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Funds that you can access immediately">
                    <i class="fas fa-info-circle"></i>
                </span>
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
                {{ currency_format($finances->get('Instant Funds',0), currency()->getUserCurrency()) }}
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
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
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                Savings
                &nbsp; <span class="btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Funds that you can access that would take 24 hours or more to become available. Examples are long term savings, ISAs & investments.">
                    <i class="fas fa-info-circle"></i>
                </span>

            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
              {{ currency_format($finances->get('Long Term Savings',0) + $finances->get('Stashed Cash',0), currency()->getUserCurrency()) }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-piggy-bank fa-2x text-gray-300"></i>
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
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                Short Term Liabilities
                &nbsp; <span class="btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Debts that are immenently due eg: credit card repayments.">
                    <i class="fas fa-info-circle"></i>
                </span>
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ currency_format($finances->get('Short Term Liabilities',0), currency()->getUserCurrency()) }}
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-credit-card fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body pt-1">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                  Long Term Liabilities
                  &nbsp; <span class="btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Debts that are being paid off over a long period of time including mortgages & loans.">
                    <i class="fas fa-info-circle"></i>
                </span>

                </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ currency_format($finances->get('Long Term Liabilities',0), currency()->getUserCurrency()) }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-file-invoice-dollar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

</div>