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
<!-- Hero Section End -->


<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="front_assets/test/images/5.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text" >
                    <h2 style="font-family: 'Roboto Slab', serif; letter-spacing: 2px;">Chia sẻ</h2>
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
<div class="container" style="margin-top: 50px">

    @foreach ($blogs as $blog)
        <div class="col-xs-6 col-sm-8 col-md-10 col-lg-12">
            <h2 style="text-align: center; letter-spacing: 2px;font-size: 43px; font-family:Georgia; font-weight: bold;text-transform: capitalize">{{ $blog->title }}</h2>
            <h3 style="text-align: center;color: #696969; font-family:Georgia;">Running Strong Since {{$blog->created_at}}</h3>
            <hr style="width: 200px; background-color: #7fad39; height:2px; ">
            <br>
            <img src="uploads/blogs/{{$blog->image}}" alt="" style="width: 1150px; height:500px">

            <div style="text-align: justify; font-size: 18px; margin-top: 20px; color: #696969; font-family:Georgia;">
                <p>{{$blog->content}}</p>
            </div>
            <hr>
        </div>
    @endforeach



</div>

@endsection
@section('script')
    <script>
        if(window.location.pathname === '/blog')
        {
            $(".home").css("color", "#000");
            $(".blog").css("color", "#7fad39");
        }
    </script>
@endsection
