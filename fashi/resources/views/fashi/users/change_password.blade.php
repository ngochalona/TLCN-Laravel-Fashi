@extends('fashi.layouts.master')

@section('content')
<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Loại Sản Phẩm</span>
                    </div>

                    <ul>
                        @foreach ($categoriess as $category)
                            @if ($category->status == 1)
                                <li><a href="{{ url('/categories/'. $category->id)}}">{{$category->name}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="{{ url('/elasticSearch')}}" method="get"> {{csrf_field()}}
                            <input type="text" name="search" placeholder="Bạn cần kiếm đồ?">
                            <button type="submit" class="site-btn">TÌM KIẾM</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>0966060152</h5>
                            <span>hỗ trợ 24/7</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="front_assets/test/images/5.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text" >
                    <h2 style="font-family: 'Roboto Slab', serif; letter-spacing: 2px;">Đổi mật khẩu</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ url('/')}}">Trang chủ</a>
                        <a href="{{ url('/account')}}">Tài khoản</a>
                        <span>Đổi mật khẩu</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
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

<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">

                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-md-6">
                        <h4>Đổi mật khẩu</h4>
                        <form action="{{url('/change-password')}}" method="post" id="registerForm">{{csrf_field('')}}
                        <div class="checkout__input">
                            <input  type="hidden" id="old_pwd" name="old_pwd">
                        </div>
                        <div class="checkout__input">
                            <p>Mật khẩu cũ</p>
                            <input type="password" id="current_password" name="current_password">
                        </div>
                        <div class="checkout__input">
                            <p>Mật khẩu mới</p>
                            <input type="password" id="new_pwd" name="new_pwd">
                        </div>

                        <button style="float: left" type="submit" class="site-btn">Cập nhật</button>

                        </form>
                    </div>

                </div>
            </form>
        </div>
    </div>
</section>


<!-- Login Form Section End -->

@endsection
