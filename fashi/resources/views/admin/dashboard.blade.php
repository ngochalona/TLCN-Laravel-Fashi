@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="header-icon">
          <i class="fa fa-dashboard"></i>
       </div>
       <div class="header-title">
          <h1>CRM Admin Dashboard</h1>
          <small>Very detailed & featured admin.</small>
       </div>
    </section>
    <!-- Main content -->
    <section class="content">
       <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
             <div id="cardbox1">
                <div class="statistic-box">
                   <i class="fa fa-user-plus fa-3x"></i>
                   <div class="counter-number pull-right">
                      <span class="count-number">{{$countUser}}</span>
                      <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                      </span>
                   </div>
                   <h3> Active Client</h3>
                </div>
             </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
             <div id="cardbox2">
                <div class="statistic-box">
                   <i class="fa fa-user-secret fa-3x"></i>
                   <div class="counter-number pull-right">
                      <span class="count-number">1</span>
                      <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                      </span>
                   </div>
                   <h3>  Active Admin</h3>
                </div>
             </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
             <div id="cardbox3">
                <div class="statistic-box">
                   <i class="fa fa-money fa-3x"></i>
                   <div class="counter-number pull-right">
                      <i class="ti ti-money"></i><span class="count-number">{{$totalAveune}}</span>
                      <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                      </span>
                   </div>
                   <h3>  Total Expenses</h3>
                </div>
             </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
             <div id="cardbox4">
                <div class="statistic-box">
                   <i class="fa fa-files-o fa-3x"></i>
                   <div class="counter-number pull-right">
                      <span class="count-number">11</span>
                      <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                      </span>
                   </div>
                   <h3> Running Projects</h3>
                </div>
             </div>
          </div>
       </div>



       <div class="row">
        <!-- Barchart -->
        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
           <div class="panel panel-bd lobidisable">
              <div class="panel-heading">
                 <div class="panel-title">
                    <h4>This Year User Chart(Line chart)</h4>
                 </div>
              </div>
              <div class="panel-body">
                  <figure class="highcharts-figure">
                      <div id="container1"></div>
                      <p class="highcharts-description">
                          This pie chart shows how the chart legend can be used to provide
                          information about the individual slices.
                      </p>
                  </figure>
              </div>
           </div>
        </div>
        <!-- bar chart -->
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
           <div class="panel panel-bd lobidisable">
              <div class="panel-heading">
                 <div class="panel-title">
                    <h4>This Year Avenue Chart(column chart)</h4>
                 </div>
              </div>
              <div class="panel-body">
                  <figure class="highcharts-figure">
                      <div id="container2"></div>
                      <p class="highcharts-description">
                          Chart showing use of rotated axis labels and data labels. This can be a
                          way to include more labels in the chart
                      </p>
                  </figure>
              </div>
           </div>
        </div>
     </div>
     <!-- /.row -->


       <div class="row">
        <div class="col-xs-12 col-sm-12">
           <div class="panel panel-bd lobidrag">
              <div class="panel-heading">
                 <div class="panel-title">
                    <h4>Google Map</h4>
                 </div>
              </div>
              <div class="panel-body">
                 <div class="google-maps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.499197804713!2d106.68713375059683!3d10.773026292286179!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f3ca0da684d%3A0x32c352459c6757c8!2sGreen%20Academy!5e0!3m2!1svi!2s!4v1593175304636!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"style="width: 100%"></iframe>
                 </div>
              </div>
           </div>
        </div>

     </div>


    </section>
    <!-- /.content -->
 </div>
@endsection

@section('script')
    <script>

var month = <?php echo json_encode($monthOfAvenue) ?>;
var avenue = <?php echo json_encode($avenue) ?>;
var users =  <?php echo json_encode($users) ?>;

    Highcharts.chart('container1', {
        title: {
            text: 'New User Growth, 2020'
        },
        subtitle: {
            text: 'Source: codechief.org'
        },
         xAxis: {
            categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
        },
        yAxis: {
            title: {
                text: 'Number of New Users'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'New Users',
            data: users
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
});






Highcharts.chart('container2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'World\'s largest cities per 2020'
    },
    subtitle: {
        text: 'Source: <a href="http://en.wikipedia.org/wiki/List_of_cities_proper_by_population">Wikipedia</a>'
    },
    xAxis: {
        categories: month
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Population (millions)'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Population in 2017: <b>{point.y:.1f} millions</b>'
    },
    series: [{
        name: 'Population',
        data: avenue,
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});
    </script>
@endsection
