<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Fund History</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area">
                <canvas id="myAreaChart"></canvas>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

@isset($history)
    @php
       
        $historyByDate = $history->groupBy(function ($item) {
            return $item->date->format('Y-m-d'); 
        });
        $historyByType = $history->groupBy('name')->forget(['Short Term Liabilities', 'Long Term Liabilities']);
    
        $colours = collect(['green','blue','purple','yellow','red']);

        $datasets = [];
        foreach ($historyByType as $type => $data) {
            $colour = $colours->shift();
            $dataset[] = "{
                        label: '{$type}',
                        borderColor: window.chartColors.$colour,
                        backgroundColor: window.chartColors.$colour,
                        data: [".$data->pluck('total')->join(',')."],
                    }";
        }
    @endphp

@endisset

@push('js')
<script type="text/javascript">
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

window.chartColors = {
	red: 'rgb(255, 99, 132)',
	orange: 'rgb(255, 159, 64)',
	yellow: 'rgb(255, 205, 86)',
	green: 'rgb(75, 192, 192)',
	blue: 'rgb(54, 162, 235)',
	purple: 'rgb(153, 102, 255)',
	grey: 'rgb(201, 203, 207)'
};


// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var MONTHS = ["{!! $historyByDate->keys()->join('","') !!}"];
		var config = {
			type: 'line',
			data: {
				labels: ["{!! $historyByDate->keys()->join('","') !!}"],
				datasets: [ {!! collect($dataset)->join(',') !!}]
			},
			options: {
				responsive: true,
                maintainAspectRatio: false,
                
				title: {
					display: true,
					text: 'Funds over time'
				},
				tooltips: {
					mode: 'index',
                    callbacks: {
                        label: function(tooltipItem, data) {
                            return data.datasets[tooltipItem.datasetIndex].label+ " : " + format(tooltipItem.yLabel);
                        }
                    }
				},
				hover: {
					mode: 'index'
				},
				scales: {
					xAxes: [{
						scaleLabel: {
							display: true,
							labelString: 'Month'
						}
					}],
					yAxes: [{
						stacked: true,
						scaleLabel: {
							display: true,
							labelString: 'Value'
						},
                        ticks: {
                            beginAtZero: true,
                            callback: function(value, index, values) {
                            
                                return format(parseInt(value));
                            
                            }
                        }
					}]
				}
			}
		};

		window.onload = function() {
		
			window.myLine = new Chart(ctx, config);
          
		};

</script>

@endpush
