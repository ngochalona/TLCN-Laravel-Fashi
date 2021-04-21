@extends('fashi.layouts.master')

@section('content')
<!-- Hero Section Begin -->
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
                    <h2 style="font-family: 'Roboto Slab', serif; letter-spacing: 2px;">Đăng nhập</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ url('/')}}">Trang chủ</a>
                        <span>Đăng nhập</span>
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

 <section class="checkout spad">
    <div class="container">
        <div class="checkout__form">

                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-md-6">
                        <h4>Đăng nhập</h4>
                        <form action="{{url('/userLogin')}}" method="post" id="LoginForm">{{csrf_field()}}
                        <div class="checkout__input">
                            <p>Email<span>*</span></p>
                            <input type="email" id="email" name="email">
                        </div>
                        <div class="checkout__input">
                            <p>Mật khẩu<span>*</span></p>
                            <input type="password" id="password" name="password">
                        </div>
                        <button style="float: left" type="submit" class="site-btn">Đăng nhập</button>
                        <div class="footer__widget" style="float: right" >
                            <div class="footer__widget__social">
                                <a href="{{ route('redirectFacebook',['facebook']) }}" data-toggle="tooltip" title="Đăng nhập với Facebook" style="font-size: medium"><i class="fa fa-facebook"></i></a>
                                <a href="{{ route('redirectGoogle') }}" data-toggle="tooltip" title="Đăng nhập với Google"><i class="fa fa-google"></i></a>
                                <a href="{{ url('/userRegister')}}" data-toggle="tooltip" title="Tạo tài khoản mới"><i class="fa fa-user-plus"></i></a>
                            </div>
                        </div>
                        </form>
                    </div>

                    {{-- <div class="switch-login">
                        <a href="{{ route('redirectGoogle') }}" class="or-login">Login with google</a>
                    </div>
                    <div class="switch-login">
                        <a href="{{ route('redirectFacebook',['facebook']) }}" class="or-login">Login with facebook</a>
                    </div>
                    <div class="switch-login">
                        <a href="{{ url('/userRegister')}}" class="or-login">Or Create An Account</a>
                    </div> --}}

                </div>
            </form>
        </div>
    </div>
</section>


<!-- Login Form Section End -->
@endsection

@section('script')
    <script>
        $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
    </script>
@endsection
