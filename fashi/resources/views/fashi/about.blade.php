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
            <p><span style="font-size: 20px;color: #000000">Welcome to Fashi Shop,</span> your number one source for all things clothes, such as: t-shirt, shirt, dress, pant, etc. We're dedicated to giving you the very best of clothes, with a focus on three people, such as: Men, Women and children.
                Founded in 2020 by Ngoc Le, Fashi shop has come a long way from its beginnings in a VietNam, such as: Shop street, center mall. When Ngoc Le first started out, her passion for helping others be more confident in their perfect appearance drove her to work hard, and gave her the impetus to turn hard work and inspiration into to a booming online store.
                We now serve customers all over the world, and are thrilled to be a part of the eco-friendly wing of the fashion industry.</p>

            <p>We hope you enjoy our products as much as we enjoy offering them to you. If you have any questions or comments, please don't hesitate to contact us.</p>

            <p>Sincerely,</p>
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
