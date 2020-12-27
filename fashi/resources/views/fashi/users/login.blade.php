@extends('fashi.layouts.master')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{ url('/')}}"><i class="fa fa-home"></i> Home</a>
                        <span>Login</span>
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
                                <h2>Login</h2>
                                <form action="{{url('/userLogin')}}" method="post" id="LoginForm">{{csrf_field()}}
                                    <div class="group-input">
                                        <label for="username">Email address *</label>
                                        <input type="email" id="email" name="email">
                                    </div>
                                    <div class="group-input">
                                        <label for="pass">Password *</label>
                                        <input type="password" id="password" name="password">
                                    </div>
                                    {{-- <div class="group-input gi-check">
                                        <div class="gi-more">

                                            <a href="#" style="text-decoration: none;" class="forget-pass">Forget your Password</a>
                                        </div>
                                    </div> --}}
                                    <button type="submit" class="site-btn login-btn dangnhap">Sign In</button>
                                </form>
                                <div class="switch-login">
                                    <a href="{{ route('redirectGoogle') }}" class="or-login">Login with google</a>
                                </div>
                                <div class="switch-login">
                                    <a href="{{ url('/userRegister')}}" class="or-login">Or Create An Account</a>
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
