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
                    <h2 style="font-family: 'Roboto Slab', serif; letter-spacing: 2px;">Về chúng tôi</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ url('/')}}">Trang chủ</a>
                        <span>Sản phẩm</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<!-- Hero Section End -->
<div class="container" style="margin-top: 50px">


    <div class="col-xs-6 col-sm-8 col-md-10 col-lg-12">
        <h2 style="text-align: center; letter-spacing: 2px;font-size: 43px; font-family:Georgia; font-weight: bold">OUR STORY</h2>
        <h3 style="text-align: center;color: #696969; font-family:Georgia;">Running Strong Since 2021</h3>
        <hr style="width: 200px; background-color: #7fad39; height:2px; ">
        <br>
        <img src="uploads/products/about-us.jpg" alt="">

        <div style="text-align: justify; font-size: 18px; margin-top: 20px; color: #696969; font-family:'Fraunces', serif;">
            <p><span style="font-size: 20px;color: #000000">Chào mừng đến với Fashi Shop, </span>thời trang Fashi là thương hiệu thời trang hàng đầu Việt Nam. Thành lập năm 2002, NEM đã từng bước tạo dựng được niềm tin và có được vị thế trong lòng khách hàng.</p>

            <p>Mỗi tháng, Fashi cho ra mắt trên 500 mẫu thời trang. Dòng thời trang của NEM hiện nay rất đa dạng, từ sản phẩm cao cấp cho nam và nữ cho tới sản phẩm trung cấp phổ thông. Những mẫu trang phục dựa trên thông tin đánh giá thị trường, nghiên cứu xu hướng thời trang thế giới và sở thích của khách hàng Việt Nam. Đồng thời, những trang phục của Fashi cũng luôn được đánh giá cao trong việc dự báo trước các xu hướng thời trang về gam màu, kiểu dáng, cách xử lý chất liệu… trở thành tâm điểm của làng thời trang Việt trong mỗi lần tạo dựng Bộ sưu tập mới.

                Hệ thống cửa hàng với chuẩn thống nhất bao phủ khắp các đô thị lớn trên cả nước và tọa lạc tại những khu phố “vàng”.

                Thời trang Fashi luôn cố gắng giữ vững vị trí tiên phong trong việc dẫn dắt xu hướng thời trang Việt Nam.</p>

            <p>Cám ơn quý khách hàng đã luôn ủng hộ chúng tôi!</p>
            <p>Ngoc Le, Founder.</p>
        </div>

    </div>

</div>

@endsection
@section('script')
    <script>
        if(window.location.pathname === '/about')
        {
            $(".home").css("color", "#000");
            $(".about").css("color", "#7fad39");
        }
    </script>
@endsection
