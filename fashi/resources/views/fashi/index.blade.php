@extends('fashi.layouts.master')

@section('content')
<!-- Hero Section Begin -->
<section class="hero">
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


    <div id="demo" class="carousel slide" data-ride="carousel">

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="front_assets/test/images/slide-1.jpg" style="height: 300px" alt="Los Angeles" width="1100" height="500">
            </div>
            @foreach ($banners as $banner)
                <div class="carousel-item">
                    <img src="uploads/banners/{{ $banner->image }}" style="height: 300px" alt="Chicago" width="1100" height="500">
                </div>
            @endforeach
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->




<!-- All products Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                @foreach ($products as $product)
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="uploads/products/{{ $product->image }}">
                            <h5><a href="{{ url('/product/'.$product->id)}}">{{$product->name}}</a></h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Products Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Product</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        @foreach ($categoriess as $category)
                            @if ($category->status == 1)
                                <li onclick="showProductByCate({{$category->id}})">{{$category->name}}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter showProduct">
            @foreach ($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mix">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="uploads/products/{{ $product->image }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="{{ url('/product/'.$product->id)}}"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">{{ $product->name }} VND</a></h6>
                            <h5>{{ $product->discounted_price }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="front_assets/test/images/banner-3.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="front_assets/test/images/banner-4.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Latest Product Section Begin -->
<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="latest-product__text">
                    <h4>Sản Phẩm Mới </h4>
                    <div class="latest-product__slider owl-carousel">
                        <?php
                            $j = 1;
                            if($countNew % 3 == 0)
                                $count = $countNew/3;
                            else {
                                $count = $countNew/3 + 1;
                            }
                        ?>
                        @for ($i = 1; $i <= $count; $i++)
                            <div class="latest-prdouct__slider__item">
                                @for ($j; $j <= $i * 3; $j++)
                                    @if (isset($newProducts[$j-1]))
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img style="width: 150px; height: 150px; border-radius: 10%" src="uploads/products/{{ $newProducts[$j-1]->image }}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">

                                                    <h6>{{$newProducts[$j-1]->name}}</h6>
                                                    <span>{{ $newProducts[$j-1]->discounted_price }}</span><span style="color: grey; text-decoration: line-through; font-weight: normal; ">{{ $newProducts[$j-1]->price }}</span>


                                            </div>
                                        </a>
                                    @endif
                                @endfor
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="latest-product__text">
                    <h4>Sản Phẩm Hot</h4>
                    <div class="latest-product__slider owl-carousel">
                        <?php
                            $j = 1;
                            if($countHot % 3 == 0)
                                $countH = $countHot/3;
                            else {
                                $countH = $countHot/3 + 1;
                            }
                        ?>
                        @for ($i = 1; $i <= $countH; $i++)
                            <div class="latest-prdouct__slider__item">
                                @for ($j; $j <= $i * 3; $j++)
                                    @if (isset($hotProducts[$j-1]))
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img style="width: 150px; height: 150px; border-radius: 10%" src="uploads/products/{{ $hotProducts[$j-1]->image }}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">

                                                    <h6>{{$hotProducts[$j-1]->name}}</h6>
                                                    <span>{{ $hotProducts[$j-1]->discounted_price }}</span><span style="color: grey; text-decoration: line-through; font-weight: normal; ">{{ $hotProducts[$j-1]->price }}</span>


                                            </div>
                                        </a>
                                    @endif
                                @endfor
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Product Section End -->

<!-- Blog Section Begin -->
<section class="from-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2>From The Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="front_assets/test/img/blog/blog-1.jpg" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="#">Cooking tips make cooking simple</a></h5>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="front_assets/test/img/blog/blog-2.jpg" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="front_assets/test/img/blog/blog-3.jpg" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="#">Visit the clean farm in the US</a></h5>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->


@endsection

@section('script')
    <script>


            function showProductByCate(idCate)
            {
                $.get("showProductByCate/" + idCate,function (data) {
                    if(typeof(data) === "string")
                    {
                        data = JSON.parse(data)
                    }

                    var dt = '';
                    var stl = '';
                    var redirect = '';
                    data.forEach(element => {
                        stl = "background-image: url('uploads/products/" + element['image'] + "')";
                        redirect = "/product/" + element['id'];
                        dt +=
                            '<div class="col-lg-3 col-md-4 col-sm-6 mix">' +
                                '<div class="featured__item">' +
                                    '<div class="featured__item__pic set-bg" style="' + stl + '">' +
                                        '<ul class="featured__item__pic__hover">' +
                                            '<li><a href="' + redirect + '"><i class="fa fa-shopping-cart"></i></a></li>' +
                                        '</ul>' +
                                    '</div>'+
                                    '<div class="featured__item__text">' +
                                        '<h6><a href="#">'+ element['name'] +'</a></h6>' +
                                        '<h5>'+ element['discounted_price'] +' VND</h5>' +
                                    '</div>' +
                                '</div>' +
                            '</div>';
                    });

                    $(".showProduct").html(dt);
                });
            }


    </script>



@endsection
