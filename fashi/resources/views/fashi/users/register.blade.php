@extends('fashi.layouts.master')

@section('content')
     <!-- Breadcrumb Section Begin -->
     <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{ url('/')}}"><i class="fa fa-home"></i> Home</a>
                        <span>Register</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    @if (count($errors)>0)
        @foreach($errors->all() as $err)
            <div class="alert alert-danger alert-block" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>{{$err}}</strong>
            </div>
        @endforeach
    @endif




 <!-- Login Section Begin -->
    <div class="container">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">

            <div class="register-login-section spad">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <div class="login-form">
                                <h2>Register</h2>
                                <form action="{{url('/userRegister')}}" method="post" id="registerForm">{{csrf_field('')}}
                                    <div class="group-input">
                                        <label for="username">Username *</label>
                                        <input type="text" id="name" name="name">
                                    </div>
                                    <div class="group-input">
                                        <label for="username">Email *</label>
                                        <input type="email" id="email" name="email">
                                    </div>
                                    <div class="group-input">
                                        <label for="pass">Password *</label>
                                        <input type="password" id="password" name="password">
                                    </div>
                                    <div class="group-input">
                                        <label for="con-pass">Confirm Password *</label>
                                        <input type="password" id="passwordAgain" name="passwordAgain">
                                    </div>
                                    <button type="submit" class="site-btn login-btn dangnhap">Register</button>
                                </form>
                                <div class="switch-login">
                                    <a href="{{ url('/userLogin')}}" class="or-login">Or Login</a>
                                </div>
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
