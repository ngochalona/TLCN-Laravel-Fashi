@extends('fashi.layouts.master')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
                        <span>account</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

<div class="container" style="margin-top: 30px">
    <div class="col-lg-4 col-md-12 col-sm-12">
        <div style="border: 2px solid #E7AB3C; height: 200px; text-align:center; border-radius: 10px; margin: 0px auto">
            <div style=" margin: 19px auto;margin-bottom: 0px;background-color: #043763; border: 1px solid #043763; border-radius: 100%; width: 90px; height: 90px; text-align:center">
                <a href="{{ url('/change-password')}}"><i class="fas fa-lock" style="font-size: 40px; color: white;margin-top: 22px; "></i></a>
            </div>
            <h4 style=" margin-top: 16px;margin-bottom: 4px;">Change Password</h4>
            <p style="color: gray">change password</p>
        </div>
    </div>

    <div class="col-lg-4 col-md-12 col-sm-12">
        <div style="border: 2px solid #E7AB3C; height: 200px; text-align:center; border-radius: 10px; margin: 0px auto">
            <div style=" margin: 19px auto;margin-bottom: 0px;background-color: #043763; border: 1px solid #043763; border-radius: 100%; width: 90px; height: 90px; text-align:center">
                <a href="{{ url('/orders')}}"><i class="fas fa-gifts" style="font-size: 40px; color: white;margin-top: 22px; "></i></a>
            </div>
            <h4 style=" margin-top: 16px;margin-bottom: 4px;">Your Orders</h4>
            <p style="color: gray">Track & View Your Orders</p>
        </div>
    </div>

    <div class="col-lg-4 col-md-12 col-sm-12">
        <div style="border: 2px solid #E7AB3C; height: 200px; text-align:center; border-radius: 10px; margin: 0px auto">
            <div style=" margin: 19px auto;margin-bottom: 0px;background-color: #043763; border: 1px solid #043763; border-radius: 100%; width: 90px; height: 90px; text-align:center">
                <a href="{{ url('/change-address')}}"><i class="fas fa-paper-plane" style="font-size: 40px; color: white;margin-top: 22px; "></i></a>
            </div>
            <h4 style=" margin-top: 16px;margin-bottom: 4px;">Change Address</h4>
            <p style="color: gray">change address</p>
        </div>
    </div>
</div>
@endsection
