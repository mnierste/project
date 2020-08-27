@extends('layouts.layouts')

@section('title', 'Mnierste Data Project')

@section('css')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
@endsection

@section('content')

@php
// fake 2019 sales data using Mockaroo
$graph_data2019 = json_decode(file_get_contents(asset('/MOCK_DATA2019.json')), true);

$totalSalesMonths2019 = Array();

$totalSalesMonths2019['Total']['Jan']=0;
$totalSalesMonths2019['Total']['Feb']=0;
$totalSalesMonths2019['Total']['Mar']=0;
$totalSalesMonths2019['Total']['Apr']=0;
$totalSalesMonths2019['Total']['May']=0;
$totalSalesMonths2019['Total']['Jun']=0;
$totalSalesMonths2019['Total']['Jul']=0;
$totalSalesMonths2019['Total']['Aug']=0;
$totalSalesMonths2019['Total']['Sep']=0;
$totalSalesMonths2019['Total']['Oct']=0;
$totalSalesMonths2019['Total']['Nov']=0;
$totalSalesMonths2019['Total']['Dec']=0;
$totalSalesMonths2019['Total']['Error']=0;
$totalSalesMonths2019['Total']['Total'] = 0;

//grab new customers
$newcustomers = Array();
$newcustomers['2019'] = 0;

//grab total sales amount (would be easier coming from a database)
for($i=0;$i< count($graph_data2019);$i++){

  //new customer added to total
  if($graph_data2019[$i]['is_new_customer'] ==1){
    $newcustomers['2019'] += 1;
  }

  //take out $ so we can add totals
  $sale = str_replace("$", "", $graph_data2019[$i]['sale_amount']);

  //add to total
  $totalSalesMonths2019['Total']['Total'] += $sale;

  //find which sales belongs to which month for graphs
  $date = explode("/", $graph_data2019[$i]['date_of_sale']);

  switch ($date[0]) {
    case 1:
      $totalSalesMonths2019['Jan'][]= $graph_data2019[$i]['sale_amount'];
      $totalSalesMonths2019['Total']['Jan'] += $sale;
      break;
    case 2:
      $totalSalesMonths2019['Feb'][]= $graph_data2019[$i]['sale_amount'];
      $totalSalesMonths2019['Total']['Feb'] += $sale;
      break;
    case 3:
      $totalSalesMonths2019['Mar'][]= $graph_data2019[$i]['sale_amount'];
      $totalSalesMonths2019['Total']['Mar'] += $sale;
      break;
    case 4:
      $totalSalesMonths2019['Apr'][]= $graph_data2019[$i]['sale_amount'];
      $totalSalesMonths2019['Total']['Apr'] += $sale;
      break;
    case 5:
      $totalSalesMonths2019['May'][]= $graph_data2019[$i]['sale_amount'];
      $totalSalesMonths2019['Total']['May'] += $sale;
      break;
    case 6:
      $totalSalesMonths2019['Jun'][]= $graph_data2019[$i]['sale_amount'];
      $totalSalesMonths2019['Total']['Jun'] += $sale;
      break;
    case 7:
      $totalSalesMonths2019['Jul'][]= $graph_data2019[$i]['sale_amount'];
      $totalSalesMonths2019['Total']['Jul'] += $sale;
      break;
    case 8:
      $totalSalesMonths2019['Aug'][]= $graph_data2019[$i]['sale_amount'];
      $totalSalesMonths2019['Total']['Aug'] += $sale;
      break;
    case 9:
      $totalSalesMonths2019['Sep'][]= $graph_data2019[$i]['sale_amount'];
      $totalSalesMonths2019['Total']['Sep'] += $sale;
      break;
    case 10:
      $totalSalesMonths2019['Oct'][]= $graph_data2019[$i]['sale_amount'];
      $totalSalesMonths2019['Total']['Oct'] += $sale;
      break;
    case 11:
      $totalSalesMonths2019['Nov'][]= $graph_data2019[$i]['sale_amount'];
      $totalSalesMonths2019['Total']['Nov'] += $sale;
      break;
    case 12:
      $totalSalesMonths2019['Dec'][]= $graph_data2019[$i]['sale_amount'];
      $totalSalesMonths2019['Total']['Dec'] += $sale;
      break;
    default:
      $totalSalesMonths2019['Error'] = $graph_data2019[$i]['sale_amount'];
      $totalSalesMonths2019['Total']['Error'] += $sale;
    }
}
############## 2020 ##############
$graph_data2020 = json_decode(file_get_contents(asset('/MOCK_DATA2020.json')), true);

$totalSalesMonths2020 = Array();

$totalSalesMonths2020['Total']['Jan']=0;
$totalSalesMonths2020['Total']['Feb']=0;
$totalSalesMonths2020['Total']['Mar']=0;
$totalSalesMonths2020['Total']['Apr']=0;
$totalSalesMonths2020['Total']['May']=0;
$totalSalesMonths2020['Total']['Jun']=0;
$totalSalesMonths2020['Total']['Jul']=0;
$totalSalesMonths2020['Total']['Aug']=0;
$totalSalesMonths2020['Total']['Sep']=0;
$totalSalesMonths2020['Total']['Oct']=0;
$totalSalesMonths2020['Total']['Nov']=0;
$totalSalesMonths2020['Total']['Dec']=0;
$totalSalesMonths2020['Total']['Error']=0;
$totalSalesMonths2020['Total']['Total'] = 0;

$newcustomers['2020'] = 0;

for($i=0;$i< count($graph_data2020);$i++){

  //add new customer to 2020 total
  if($graph_data2020[$i]['is_new_customer'] ==1){
    $newcustomers['2020'] += 1;
  }

  //get data ready to add to totals
  $sale = str_replace("$", "", $graph_data2020[$i]['sale_amount']);

  //add to 2020 total
  $totalSalesMonths2020['Total']['Total'] += $sale;

  //find which sales belongs to which month for graphs
  $date = explode("/", $graph_data2020[$i]['date_of_sale']);

  switch ($date[0]) {
    case 1:
      $totalSalesMonths2020['Jan'][]= $graph_data2020[$i]['sale_amount'];
      $totalSalesMonths2020['Total']['Jan'] += $sale;
      break;
    case 2:
      $totalSalesMonths2020['Feb'][]= $graph_data2020[$i]['sale_amount'];
      $totalSalesMonths2020['Total']['Feb'] += $sale;
      break;
    case 3:
      $totalSalesMonths2020['Mar'][]= $graph_data2020[$i]['sale_amount'];
      $totalSalesMonths2020['Total']['Mar'] += $sale;
      break;
    case 4:
      $totalSalesMonths2020['Apr'][]= $graph_data2020[$i]['sale_amount'];
      $totalSalesMonths2020['Total']['Apr'] += $sale;
      break;
    case 5:
      $totalSalesMonths2020['May'][]= $graph_data2020[$i]['sale_amount'];
      $totalSalesMonths2020['Total']['May'] += $sale;
      break;
    case 6:
      $totalSalesMonths2020['Jun'][]= $graph_data2020[$i]['sale_amount'];
      $totalSalesMonths2020['Total']['Jun'] += $sale;
      break;
    case 7:
      $totalSalesMonths2020['Jul'][]= $graph_data2020[$i]['sale_amount'];
      $totalSalesMonths2020['Total']['Jul'] += $sale;
      break;
    case 8:
      $totalSalesMonths2020['Aug'][]= $graph_data2020[$i]['sale_amount'];
      $totalSalesMonths2020['Total']['Aug'] += $sale;
      break;
    case 9:
      $totalSalesMonths2020['Sep'][]= $graph_data2020[$i]['sale_amount'];
      $totalSalesMonths2020['Total']['Sep'] += $sale;
      break;
    case 10:
      $totalSalesMonths2020['Oct'][]= $graph_data2020[$i]['sale_amount'];
      $totalSalesMonths2020['Total']['Oct'] += $sale;
      break;
    case 11:
      $totalSalesMonths2020['Nov'][]= $graph_data2020[$i]['sale_amount'];
      $totalSalesMonths2020['Total']['Nov'] += $sale;
      break;
    case 12:
      $totalSalesMonths2020['Dec'][]= $graph_data2020[$i]['sale_amount'];
      $totalSalesMonths2020['Total']['Dec'] += $sale;
      break;
    default:
      $totalSalesMonths2020['Error'] = $graph_data2020[$i]['sale_amount'];
      $totalSalesMonths2020['Total']['Error'] += $sale;
    }
}

//merge years together for table data
$table_data = array_merge($graph_data2019, $graph_data2020);

@endphp

<div class="content p-b-md datacolorBackground p-t-md">
  <div class="container">
    <div class="row ">
      <div class="col-md-7 col-sm-12">
        <div class="card p-a-20 m-b-sm">
          <div class="card-header datacolorBackground aboutTitle">
            <h5>Total Monthly Sales</h5>
          </div>
          <div class="card-body">
            <canvas id="totalChart" width="200" height="200"></canvas>
          </div>
        </div>

        <div class="card p-a-20">
          <div class="card-header datacolorBackground aboutTitle">
            <h5>Monthly Avg Sales</h5>
          </div>
          <div class="card-body">
            <canvas id="monthAvgChart" width="200" height="200"></canvas>
          </div>
        </div>
      </div><!--end col-8 charts-->

      <div class="col-md-5 col-sm-12">
        <div class="card p-a-20">
          <div class="card-body" style="padding-top:0px;">
            <div class="row">
              <div class=" col-12 card-header datacolorBackground aboutTitle" >
                <h5>YTD Sales Total Revenue</h5>
              </div>
            </div>
            <div class="row m-t-sm m-b-sm">
              <div class="col-md-3 col-sm-12">
                <i class="fa fa-line-chart datacolor" aria-hidden="true" style="font-size:60px;"></i>
              </div>
              <div class="col-md-9 col-sm-12">
                <div class="col-12">
                <h5>'19: ${{ number_format($totalSalesMonths2019['Total']['Total'], 2) }}</h5>
                </div>
                <div class="col-12">
                <h5>'20: ${{ number_format($totalSalesMonths2020['Total']['Total'], 2) }}</h5>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12 card-header datacolorBackground aboutTitle">
                <h5>New Customers</h5>
              </div>
            </div>

            <div class="row m-t-sm m-b-sm">
              <div class="col-md-3 col-sm-12">
                <i class="fa fa-user-plus datacolor" aria-hidden="true" style="font-size:60px;"></i>
              </div>
              <div class="col-md-9 col-sm-12">
                <div class="col-sm-12">
                  <div class="col-12">
                    <h5 class="p-t-sm">{{ $newcustomers['2020'] }}</h5>
                  </div>
                </div>
              </div>
            </div><!--end row-->

            <div class="row m-t-sm m-b-sm">
              <div class="col-12 card-header datacolorBackground aboutTitle">
                <h5>Above Sales Target</h5>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-sm-12">
                <i class="fa fa-signal datacolor" aria-hidden="true" style="font-size:60px;"></i>
              </div>

              @php

                $target = 224000.00;
                $amountTarget = number_format($totalSalesMonths2020['Total']['Total'] - $target, 2);

              @endphp
              <div class="col-md-9 col-sm-12">
                <div class="col-12">
                  <h6>Target: ${{ number_format($target, 2) }}</h6>
                </div>
                <div class="col-12">
                  <h6>Above Target: ${{ $amountTarget }}</h6>
                </div>
              </div>
            </div>

            <div class="row m-t-sm m-b-sm">
              <div class="col-12 card-header datacolorBackground aboutTitle">
                <h5>Profits YTD</h5>
              </div>
            </div>

            <div class="row">
              <div class="col-md-3 col-sm-12">
                <i class="fa fa-money datacolor" aria-hidden="true" style="font-size:60px;"></i>
              </div>
              <div class="col-md-9 col-sm-12">
                <h5 class="p-t-sm">YTD ${{number_format(130000, 2)}}</h5>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div><!--end row-->

    <div class="row m-t-sm m-b-sm">
      <div class="col-12">
        <div class="card p-a-20">
          <div class="card-header datacolorBackground aboutTitle">
            <h4>Sales Data Table (2019-2020)</h4>
          </div>
          <div class="card-body">
            <table id="datatable" class="table table-bordered table-hover table-sm">
              <thead>
                <th>#</th>
                <th>Sale Date</th>
                <th>Sale Amount</th>
                <th>New Customer?</th>
                <th>Company</th>
                <th>Employee</th>
              </thead>
              <tbody>
                @foreach($table_data as $data)
                  <tr>
                    <td>{{ $loop->index +1 }}</td>
                    <td>{{ $data['date_of_sale'] }}</td>
                    <td>{{ $data['sale_amount'] }}</td>
                    <td>
                    @if($data['is_new_customer'] == 1)
                    Yes
                    @else
                    No
                    @endif
                    </td>
                    <td>{{ $data['company'] }}</td>
                    <td>
                      @if(is_null($data['employee']) == 1)
                        Max
                      @else
                        {{ $data['employee'] }}
                      @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div><!--end card-->
      </div>
    </div><!--end row-->
  </div>
</div><!--end content-->
@endsection

@section('scripts')

  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready( function () {
        $('#datatable').DataTable();
    } );
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
  <script>
    //new chart for monthly totals
    var ctx = document.getElementById('totalChart');
    var totalChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: '2019 Sales',
                data: [{{ $totalSalesMonths2019['Total']['Jan'] }},
                {{ $totalSalesMonths2019['Total']['Feb'] }},
                {{ $totalSalesMonths2019['Total']['Mar'] }},
                {{ $totalSalesMonths2019['Total']['Apr'] }},
                {{ $totalSalesMonths2019['Total']['May'] }},
                {{ $totalSalesMonths2019['Total']['Jun'] }},
                {{ $totalSalesMonths2019['Total']['Jul'] }},
                {{ $totalSalesMonths2019['Total']['Aug'] }},
                {{ $totalSalesMonths2019['Total']['Sep'] }},
                {{ $totalSalesMonths2019['Total']['Oct'] }},
                {{ $totalSalesMonths2019['Total']['Nov'] }},
                {{ $totalSalesMonths2019['Total']['Dec'] }}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)'

                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)'

                ],
                borderWidth: 2
            },
            {
                label: '2020 Sales',
                data: [{{ $totalSalesMonths2020['Total']['Jan'] }},
                {{ $totalSalesMonths2020['Total']['Feb'] }},
                {{ $totalSalesMonths2020['Total']['Mar'] }},
                {{ $totalSalesMonths2020['Total']['Apr'] }},
                {{ $totalSalesMonths2020['Total']['May'] }},
                {{ $totalSalesMonths2020['Total']['Jun'] }},
                {{ $totalSalesMonths2020['Total']['Jul'] }},
                {{ $totalSalesMonths2020['Total']['Aug'] }},
                {{ $totalSalesMonths2020['Total']['Sep'] }},
                {{ $totalSalesMonths2020['Total']['Oct'] }},
                {{ $totalSalesMonths2020['Total']['Nov'] }},
                {{ $totalSalesMonths2020['Total']['Dec'] }}],
                backgroundColor: [
                    'rgba(40, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(40, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 2
            },

          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }

        }
    });
    //avg sale bar chart
    var ctx = document.getElementById('monthAvgChart');
    var monthAvgChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: '2019 Avg Sales',
                data: [{{ $totalSalesMonths2019['Total']['Jan'] / count($totalSalesMonths2019['Jan'] ) }},
                {{ $totalSalesMonths2019['Total']['Jan'] / count($totalSalesMonths2019['Jan'] ) }},
                {{ $totalSalesMonths2019['Total']['Feb'] / count($totalSalesMonths2019['Feb'] ) }},
                {{ $totalSalesMonths2019['Total']['Mar'] / count($totalSalesMonths2019['Mar'] ) }},
                {{ $totalSalesMonths2019['Total']['Apr'] / count($totalSalesMonths2019['Apr'] ) }},
                {{ $totalSalesMonths2019['Total']['May'] / count($totalSalesMonths2019['May'] ) }},
                {{ $totalSalesMonths2019['Total']['Jun'] / count($totalSalesMonths2019['Jun'] ) }},
                {{ $totalSalesMonths2019['Total']['Jul'] / count($totalSalesMonths2019['Jul'] ) }},
                {{ $totalSalesMonths2019['Total']['Aug'] / count($totalSalesMonths2019['Aug'] ) }},
                {{ $totalSalesMonths2019['Total']['Sep'] / count($totalSalesMonths2019['Sep'] ) }},
                {{ $totalSalesMonths2019['Total']['Oct'] / count($totalSalesMonths2019['Oct'] ) }},
                {{ $totalSalesMonths2019['Total']['Nov'] / count($totalSalesMonths2019['Nov'] ) }},
                {{ $totalSalesMonths2019['Total']['Dec'] / count($totalSalesMonths2019['Dec'] ) }}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 2
            },
            {
                label: '2020 Avg Sales',
                data: [{{ number_format($totalSalesMonths2020['Total']['Jan'] / count($totalSalesMonths2020['Jan'] ), 2)  }},
                {{ number_format($totalSalesMonths2020['Total']['Jan'] / count($totalSalesMonths2020['Jan'] ), 2) }},
                {{ number_format($totalSalesMonths2020['Total']['Feb'] / count($totalSalesMonths2020['Feb'] ), 2)  }},
                {{ number_format($totalSalesMonths2020['Total']['Mar'] / count($totalSalesMonths2020['Mar'] ), 2)  }},
                {{ number_format($totalSalesMonths2020['Total']['Apr'] / count($totalSalesMonths2020['Apr'] ), 2)  }},
                {{ number_format($totalSalesMonths2020['Total']['May'] / count($totalSalesMonths2020['May'] ), 2)  }},
                {{ number_format($totalSalesMonths2020['Total']['Jun'] / count($totalSalesMonths2020['Jun'] ), 2)  }},
                {{ number_format($totalSalesMonths2020['Total']['Jul'] / count($totalSalesMonths2020['Jul'] ), 2)  }},
                {{ number_format($totalSalesMonths2020['Total']['Aug'] / count($totalSalesMonths2020['Aug'] ), 2)  }},
                {{ number_format($totalSalesMonths2020['Total']['Sep'] / count($totalSalesMonths2020['Sep'] ), 2)  }},
                {{ number_format($totalSalesMonths2020['Total']['Oct'] / count($totalSalesMonths2020['Oct'] ), 2)  }},
                {{ number_format($totalSalesMonths2020['Total']['Nov'] / count($totalSalesMonths2020['Nov'] ), 2)  }},
                {{ number_format($totalSalesMonths2020['Total']['Dec'] / count($totalSalesMonths2020['Dec'] ), 2)  }}],
                backgroundColor: [
                    'rgba(40, 99, 132, 0.2)',
                    'rgba(40, 99, 132, 0.2)',
                    'rgba(40, 99, 132, 0.2)',
                    'rgba(40, 99, 132, 0.2)',
                    'rgba(40, 99, 132, 0.2)',
                    'rgba(40, 99, 132, 0.2)',
                    'rgba(40, 99, 132, 0.2)',
                    'rgba(40, 99, 132, 0.2)',
                    'rgba(40, 99, 132, 0.2)',
                    'rgba(40, 99, 132, 0.2)',
                    'rgba(40, 99, 132, 0.2)',
                    'rgba(40, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(40, 99, 132, 1)',
                    'rgba(40, 99, 132, 1)',
                    'rgba(40, 99, 132, 1)',
                    'rgba(40, 99, 132, 1)',
                    'rgba(40, 99, 132, 1)',
                    'rgba(40, 99, 132, 1)',
                    'rgba(40, 99, 132, 1)',
                    'rgba(40, 99, 132, 1)',
                    'rgba(40, 99, 132, 1)',
                    'rgba(40, 99, 132, 1)',
                    'rgba(40, 99, 132, 1)',
                    'rgba(40, 99, 132, 1)'

                ],
                borderWidth: 2
            },

          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }

        }
    });

  </script>
@endsection
