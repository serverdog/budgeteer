<div class="col-6 card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Bills Overview</h6>
    </div>
    <div class="card-body">

        @if ($bills->count())
        @php

        $luxury = $bills->where('luxury', true);
        $totalBills = $bills->pluck('monthlyCost')->sum();
        $luxuryBills = $luxury->pluck('monthlyCost')->sum();
        $percent = round($luxuryBills / $totalBills * 100);

        @endphp
        @if ($luxuryBills > 0)
            <div class="alert alert-warning" role="alert">
                Did you know you could save {{ currency_format($luxuryBills, currency()->getUserCurrency())  }}
                <span class="font-italic">({{$percent}}%)</span> by stopping your luxury bill items?
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($luxury as $bill)
                            <tr class=''>
                                <td>{{ $bill->name }}</td>
                                <td>{{ $bill->name }}</td>
                                <td class='text-right'>{{$bill->cost}}</td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            @endif
        @endif
    </div>
</div>