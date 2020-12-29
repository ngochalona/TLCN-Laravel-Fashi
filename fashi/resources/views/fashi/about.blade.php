@extends('fashi.layouts.master')

@section('content')

        <!-- Breadcrumb Section Begin -->
        <div class="breacrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text product-more">
                            <a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
                            <span>About</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section Begin -->
<div class="container">


    <div class="col-xs-6 col-sm-8 col-md-10 col-lg-12">
        <h2 style="text-align: center; letter-spacing: 2px;font-size: 43px; font-family:Georgia; font-weight: bold">OUR STORY</h2>
        <h3 style="text-align: center;color: #696969; font-family:Georgia;">Running Strong Since 2020</h3>
        <hr style="width: 200px; background-color: #E7AB3C; height:2px; ">
        <br>
        <img src="uploads/products/about-us.jpg" alt="">

        <div style="text-align: justify; font-size: 18px; margin-top: 20px; color: #696969; font-family:Georgia;">
            <p><span style="font-size: 20px;color: #000000">Chào mừng đến với Fashi Shop,</span>Thời trang Fashi là thương hiệu thời trang hàng đầu Việt Nam. Thành lập năm 2002, NEM đã từng bước tạo dựng được niềm tin và có được vị thế trong lòng khách hàng.</p>

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
            $(".home").css("background-color", "#222222");
            $(".about").css("background-color", "#E7AB3C");
            $(".about_a").css("color", "#FFFFFF");
            $(".category").css("background-color", "#222222");
            $(".contact").css("background-color", "#222222");
            $(".blog").css("background-color", "#222222");
            $(".cart").css("background-color", "#222222");
        }
    </script>
@endsection
