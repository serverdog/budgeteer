<div class="col-6 card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Funds Overview</h6>
    </div>
    <div class="card-body">
        @if ($details->count())
        @php

        $categories = $details->groupBy('Account.Accounttype.Category.name')->forget(['Long Term Savings', 'Long Term Liabilities']);
        $availableCash = $categories->get('Instant Funds', 0)->pluck('amount')->sum()
                        + $categories->get('Stashed Cash', 0)->pluck('amount')->sum()
                        - $categories->get('Short Term Liabilities', 0)->pluck('amount')->sum();
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
                </tbody>

            </table>
        </div>
    </div>
    @endif
</div>