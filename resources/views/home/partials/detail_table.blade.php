<div class="col-6 card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Funds detail</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Account</th>
                        <th>Funds</th>
                    </tr>
                </thead>
                @if ($details->count())
                @php

                $categories = $details->groupBy('Account.Accounttype.Category.name');

                @endphp
                <tbody>
                    @foreach ($categories as $category => $data)
                    <tr class='bg-gradient-{{ stristr($category, "Liabilities") ? "danger" : "success" }} text-gray-100'>
                        <td>{{ $category }}</td>
                        <td>&nbsp;</td>
                        <td class='text-right'>{{currency_format($data->pluck('amount')->sum(), currency()->getUserCurrency()) }}</td>
                    </tr>
                    @foreach ($data as $account)
                    <tr>
                        <td>&nbsp;</td>
                        <td>{{ $account->Account->name}}</td>
                        <td class='text-right'>{{ currency_format($account->amount, currency()->getUserCurrency()) }}</td>

                    </tr>
                    @endforeach
                    @endforeach
                </tbody>
                @endif
            </table>
        </div>
    </div>
</div>