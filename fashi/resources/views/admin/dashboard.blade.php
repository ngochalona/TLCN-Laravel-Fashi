@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-dashboard"></i>
            </div>
            <div class="header-title">
                <h1>Admin Dashboard</h1>
                <small>Trang quản lý</small>
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
                            <h3>Khách hàng</h3>
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
                            <h3>Admin</h3>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div id="cardbox3">
                        <div class="statistic-box">
                            <i class="fa fa-money fa-3x"></i>
                            <div class="counter-number pull-right">
                                <span class="count-number">{{$totalAveune}} VND</span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                      </span>
                            </div>
                            <h3>Doanh thu</h3>
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
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Google Map</h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="google-maps">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.4765140294694!2d106.75338375059735!3d10.851315392232813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527bd80c66b4f%3A0x1243c8a70dc5d2e0!2zMSBWw7UgVsSDbiBOZ8OibiwgTGluaCBDaGnhu4N1LCBUaOG7pyDEkOG7qWMsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1608354185414!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- bar chart -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="panel panel-bd lobidisable">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Doanh thu năm 2020</h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div id="chartContainer" style="height: 300px; width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->





        </section>
        <!-- /.content -->
    </div>
@endsection

@section('script')

<script type="text/javascript">
   var doanhthu = <?php echo json_encode($dataPoints);?>;

    window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer", {

            title:{
                text: "Doanh thu trong năm 2020"
            },
            axisY: {
                interval: 500
            },
            data: [
                {
                    type: "column",
                    dataPoints: doanhthu
                }
            ]
        });

        chart.render();
    }
</script>

@endsection
