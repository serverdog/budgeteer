@php
    $totals = [];
    foreach ($bills as $bill){
        if (isset($totals[$bill->category->type])) {
            $totals[$bill->category->type] = $totals[$bill->category->type] + $bill->monthlyCost;
        } else {
            $totals[$bill->category->type] = $bill->monthlyCost;
        }
    }
    $totals['Incidentals'] = $user->incidentals;
    $totals = collect($totals);

@endphp



<div class="col-xl-6 col-lg-6">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Monthly Bills by Category</h6>
        
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="chart-pie pt-4 pb-2">
          <canvas id="billsTypeChart"></canvas>
        </div>
       
      </div>
    </div>
  </div>


  @push('js')
  <script type="text/javascript">
  // Set new default font family and font color to mimic Bootstrap's default styling
  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#858796';
  
  // Pie Chart Example
  var billsGraph = document.getElementById("billsTypeChart");
  var myPieChart = new Chart(billsGraph, {
    type: 'pie',
    data: {
      labels: ["{!! $totals->keys()->join('","') !!}"],
      datasets: [{
        data: [{!! $totals->values()->join(',') !!}],
        backgroundColor: [window.chartColors.red,
						window.chartColors.orange,
						window.chartColors.yellow,
						window.chartColors.green,
                        window.chartColors.blue,
                        window.chartColors.purple,
                        window.chartColors.grey,
                    ],
       // hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      }],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
        callbacks: {
                    label: function(tooltipItem, data) {
                        var label = data.labels[tooltipItem.index],
                            value = data.datasets[0].data[tooltipItem.index];
                        return label+ " : " + format(value);
                    }
                }
      },
      legend: {
        display: true,
        position : "left"
      },
      cutoutPercentage: 10,
    },
  });
</script>

  @endpush