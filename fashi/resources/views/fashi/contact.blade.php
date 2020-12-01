@extends('fashi.layouts.master')

@section('content')

        <!-- Breadcrumb Section Begin -->
        <div class="breacrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text product-more">
                            <a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
                            <span>Contact</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section Begin -->
<div class="container">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="panel panel-warning" style="font-family:Georgia;">
            <div class="panel-heading" style="background-color:#E7AB3C; color: #000000; text-align:center" >
                <h2 style="margin-top:0px; margin-bottom:0px; ">Contact with us</h2>
            </div>

            <div class="panel-body">
                <!-- item -->

                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                    <div class="break"></div>
                    <h3><span class= "glyphicon glyphicon-home "></span> Address : </h3>
                    <h4>Số 1, Võ Văn Ngân, Linh Chiểu, Thủ Đức, Thành phố Hồ Chí Minh, Việt Nam</h4>

                    <h3><span class="glyphicon glyphicon-envelope"></span> Email : </h3>
                    <h4>SPKT@gmail.com </h4>

                    <h3><span class="glyphicon glyphicon-phone-alt"></span> Phone : </h3>
                    <h4>+84 66 060 152 </h4>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                    <h3><span class="glyphicon glyphicon-globe"></span> Google Map</h3>
                    <div class="break"></div><br>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.493658211537!2d106.76952045035063!3d10.850007560760286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752763f23816ab%3A0x282f711441b6916f!2zxJDhuqFpIGjhu41jIFPGsCBQaOG6oW0gS-G7uSBUaHXhuq10IFRow6BuaCBQaOG7kSBI4buTIENow60!5e0!3m2!1svi!2s!4v1604381267677!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                </div>


            </div>
        </div>
    </div>

</div>

@endsection
