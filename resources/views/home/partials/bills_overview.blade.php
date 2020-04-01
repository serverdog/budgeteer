<div class="col-6 card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Bills Overview</h6>
    </div>
    <div class="card-body">

        @if ($bills->count())
        @php

        
        @endphp
        @if ($luxuryBills > 0)
            <div class="alert alert-warning" role="alert">
                <i class="fas fa-info-circle"></i> &nbsp;
                Did you know you could save {{ currency_format($luxuryBills, currency()->getUserCurrency())  }}
                <span class="font-italic">({{ $luxuryBillsPercent }}%)</span> on your regular outgoings by stopping your luxury bill items? This could
                extend you sustainability by approximately <strong>{{ $extension }}</strong> days.
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            
                            <th>Name</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($luxury as $bill)
                            <tr class=''>
                               
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