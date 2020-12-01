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
                                <h2>Change Password</h2>
                                <form action="{{url('/change-password')}}" method="post" id="registerForm">{{csrf_field('')}}
                                    <div class="group-input">

                                        <input  type="hidden" id="old_pwd" name="old_pwd">
                                    </div>
                                    <div class="group-input">
                                        <label for="username">Old Password *</label>
                                        <input type="password" id="current_password" name="current_password">
                                    </div>
                                    <div class="group-input">
                                        <label for="pass">New Password *</label>
                                        <input type="password" id="new_pwd" name="new_pwd">
                                    </div>
                                    <button type="submit" class="site-btn login-btn dangnhap">Change</button>
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
