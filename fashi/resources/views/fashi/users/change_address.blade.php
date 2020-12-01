@extends('fashi.layouts.master')

@section('content')
     <!-- Breadcrumb Section Begin -->
     <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{ url('/')}}"><i class="fa fa-home"></i> Home</a>
                        <a href="{{ url('/account')}}"> Account</a>
                        <span>change password</span>
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





 <!-- Login Section Begin -->
    <div class="container">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">

            <div class="register-login-section spad">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <div class="login-form">
                                <h2>Thay đổi địa chỉ</h2>
                                <form action="{{url('/change-address')}}" method="post" id="registerForm">{{csrf_field('')}}

                                    <div class="group-input">
                                        <label for="username">Họ và tên </label>
                                        <input type="text" id="name" name="name" value="{{$userDetails->name}}">
                                    </div>
                                    <div class="group-input">
                                        <label for="username">Địa chỉ</label>
                                        <input type="text" id="address" name="address" value="{{$userDetails->address}}">
                                    </div>
                                    <div class="group-input">
                                        <label for="username">Tỉnh / Thành</label>
                                        <input type="text" id="city" name="city" value="{{$userDetails->city}}">
                                    </div>
                                    <div class="group-input">
                                        <label for="username">Quận / Huyện</label>
                                        <input type="text" id="state" name="state" value="{{$userDetails->state}}">
                                    </div>
                                    <div class="group-input">
                                        <label for="username">Phường / Xã</label>
                                        <input type="text" id="ward" name="ward" value="{{$userDetails->ward}}">
                                    </div>
                                    <div class="group-input">
                                        <label for="username">Số điện thoại</label>
                                        <input type="text" id="mobile" name="mobile" value="{{$userDetails->mobile}}">
                                    </div>
                                    <button type="submit" class="site-btn login-btn dangnhap">Cập nhật</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-3"></div>
    </div>

<!-- Login Form Section End -->
@endsection
