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
<!-- Hero Section End -->


<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="front_assets/test/images/5.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text" >
                    <h2 style="font-family: 'Roboto Slab', serif; letter-spacing: 2px;">Cảm ơn đã ủng hộ</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ url('/')}}">Trang chủ</a>
                        <span>Sản phẩm</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    @if($pass)
        <div class="container" style="margin-top: 30px; margin-bottom: 170px">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div style="border: 2px solid #E7AB3C; height: 200px; text-align:center; border-radius: 10px; margin: 0px auto">
                        <div style=" margin: 19px auto;margin-bottom: 0px;background-color: #043763; border: 1px solid #043763; border-radius: 100%; width: 90px; height: 90px; text-align:center">
                            <a href="{{ url('/change-password')}}"><i class="fas fa-lock" style="font-size: 40px; color: white;margin-top: 22px; "></i></a>
                        </div>
                        <h4 style=" margin-top: 16px;margin-bottom: 4px;">Đổi mật khẩu</h4>
                        <p style="color: gray">change password</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div style="border: 2px solid #E7AB3C; height: 200px; text-align:center; border-radius: 10px; margin: 0px auto">
                        <div style=" margin: 19px auto;margin-bottom: 0px;background-color: #043763; border: 1px solid #043763; border-radius: 100%; width: 90px; height: 90px; text-align:center">
                            <a href="{{ url('/orders')}}"><i class="fas fa-gifts" style="font-size: 40px; color: white;margin-top: 22px; "></i></a>
                        </div>
                        <h4 style=" margin-top: 16px;margin-bottom: 4px;">Đơn đã đặt</h4>
                        <p style="color: gray">View your orders</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div style="border: 2px solid #E7AB3C; height: 200px; text-align:center; border-radius: 10px; margin: 0px auto">
                        <div style=" margin: 19px auto;margin-bottom: 0px;background-color: #043763; border: 1px solid #043763; border-radius: 100%; width: 90px; height: 90px; text-align:center">
                            <a href="{{ url('/change-address')}}"><i class="fas fa-paper-plane" style="font-size: 40px; color: white;margin-top: 22px; "></i></a>
                        </div>
                        <h4 style=" margin-top: 16px;margin-bottom: 4px;">Đổi địa chỉ</h4>
                        <p style="color: gray">change address</p>
                    </div>
                </div>
            </div>

        </div>
    @else
        <div class="container" style="margin-top: 30px; margin-bottom: 170px">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-4 col-md-6">
                    <div style="border: 2px solid #E7AB3C; height: 200px; text-align:center; border-radius: 10px; margin: 0px auto">
                        <div style=" margin: 19px auto;margin-bottom: 0px;background-color: #043763; border: 1px solid #043763; border-radius: 100%; width: 90px; height: 90px; text-align:center">
                            <a href="{{ url('/orders')}}"><i class="fas fa-gifts" style="font-size: 40px; color: white;margin-top: 22px; "></i></a>
                        </div>
                        <h4 style=" margin-top: 16px;margin-bottom: 4px;">Đơn đã đặt</h4>
                        <p style="color: gray">View your orders</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div style="border: 2px solid #E7AB3C; height: 200px; text-align:center; border-radius: 10px; margin: 0px auto">
                        <div style=" margin: 19px auto;margin-bottom: 0px;background-color: #043763; border: 1px solid #043763; border-radius: 100%; width: 90px; height: 90px; text-align:center">
                            <a href="{{ url('/change-address')}}"><i class="fas fa-paper-plane" style="font-size: 40px; color: white;margin-top: 22px; "></i></a>
                        </div>
                        <h4 style=" margin-top: 16px;margin-bottom: 4px;">Đổi địa chỉ</h4>
                        <p style="color: gray">change address</p>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>

        </div>
    @endif

@endsection
