@extends('fashi.layouts.master')

@section('content')

        <!-- Breadcrumb Section Begin -->
        <div class="breacrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text product-more">
                            <a href="{{url('/')}}"><i class="fa fa-home"></i> Trang chủ</a>
                            <a href="{{url('/cart')}}">Giỏ hàng</a>
                            <a href="{{url('/')}}">Checkout</a>
                            <span>thanks</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section Begin -->

            <div class="container">
            @if (Session::has('flash_message_error'))
                <div class="alert alert-danger alert-block" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{!! session('flash_message_error') !!}</strong>
                </div>
            @endif

            @if (Session::has('flash_message_success'))
                <div class="alert alert-success alert-block" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{!! session('flash_message_success') !!}</strong>
                </div>
            @endif
        </div>

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">


                    <div class="panel-group" id="accordion">
                        <div class="panel panel-warning" style="margin-bottom: -15px">
                        <div class="panel-heading"  style="background-color: #E7AB3C !important; color: #000000; text-align:center">
                            <h4 class="panel-title">
                            <a style="text-decoration: none;    font-size: 35px;" data-toggle="collapse" data-parent="#accordion" href="#toggle">
                                Cảm ơn bạn đã mua hàng</a>
                            </h4>
                        </div>
                        <div id="toggle" class="panel-collapse collapse in" >
                            <ul class="list-group">
                                    <li  style="background-color: #FCF8E3 !important;text-align:center" class="list-group-item">
                                        <div href="" style="color: #000000; text-decoration:none;"><h4>YOUR COD ORDER HAS BEEN PLACED</h4>
                                            <p>Mã đơn hàng <b>{{Session::get('order_id')}}</b> và số tiền cần thanh toán là <b>${{Session::get('grand_total')}}</b></p></div>
                                    </li>
                            </ul>
                        </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
@endsection


<?php
    Session::forget('order_id');
    Session::forget('grand_total');

?>
