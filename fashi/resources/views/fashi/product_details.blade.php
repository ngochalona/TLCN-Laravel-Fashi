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
                    <h2 style="letter-spacing: 2px;">Chi Tiết Sản Phẩm</h2>
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

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large"
                            src="uploads/products/{{$productDetails->image}}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
            <form name="addtoCart" action="{{ url('/add-cart')}}" method="post">{{csrf_field()}}
                <div class="product__details__text">
                    <input type="hidden" value="{{$productDetails->id}}" name="product_id">
                    <input type="hidden" value="size" id="showStock">
                    <input type="hidden" value="{{$productDetails->name}}" name="product_name">
                    <input type="hidden" value="{{$productDetails->code}}" name="product_code">
                    <input type="hidden" id="price" value="{{$productDetails->discounted_price}}" name="price">
                    <h3>{{$productDetails->name}}</h3>
                    <div @if (!Auth::check())
                            aria-readonly="true"
                        @endif >
                        <i class="fa fa-star" aria-hidden="true" id="s1"></i>
                        <i class="fa fa-star" aria-hidden="true" id="s2"></i>
                        <i class="fa fa-star" aria-hidden="true" id="s3"></i>
                        <i class="fa fa-star" aria-hidden="true" id="s4"></i>
                        <i class="fa fa-star" aria-hidden="true" id="s5"></i>

                        <span
                        @if (Auth::check())
                        class="cmt"
                        @endif style="color: grey">
                        @if ($rating == 0)
                            (chưa có đánh giá)</span>
                        @else
                            (trung bình: {{round($rating, 2)}})</span>
                        @endif


                    </div>

                    <div class="product__details__price">Giá: {{$productDetails->discounted_price}} VND <span style="color: grey; text-decoration: line-through; font-weight: normal; ">{{$productDetails->price}} VND</span></div>
                    <p>{!! $productDetails->description !!}</p>
                    <div class="product__details__quantity" style="float: left">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="text" id="quantity" value="1" name="quantity" readonly>

                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="float: left;">
                        <select class="form-control"  id="selSize" name="size" >
                            <option value="0">Size</option>
                            @foreach ($productDetails->attributes as $sizes)
                                <option value="{{$productDetails->id}}-{{$sizes->size}}">{{$sizes->size}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" style="border: none;float: left; margin-left: 10px" class="primary-btn" id="addToCart">THÊM VÀO GIỎ HÀNG</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Gợi ý sản phẩm</h2>
                </div>
            </div>
        </div>
        <section class="categories">
            <div class="container">
                <div class="row">
                    <div class="categories__slider owl-carousel">
                        @if (Auth::check())
                            @if (!empty($res))
                                @foreach ($res as $key => $val)
                                <?php $product = DB::table('products')->where(['name' => $key])->first();?>
                                    @if (isset($product))
                                        <div class="col-lg-3">
                                            <div class="categories__item set-bg" data-setbg="uploads/products/{{ $product->image }}">
                                                <h5><a href="{{ url('/product/'.$product->id)}}">{{$product->name}}</a></h5>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        @else
                            @if (isset($best_seller))
                                @foreach ($best_seller as $product)
                                    <div class="col-lg-3">
                                        <div class="categories__item set-bg" data-setbg="uploads/products/{{ $product->image }}">
                                            <h5><a href="{{ url('/product/'.$product->id)}}">{{$product->name}}</a></h5>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        @endif

                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
<!-- Related Product Section End -->


@endsection
@section('script')
    <script>
       $(document).ready(function() {
            var avg = Math.round("<?php echo $rating; ?>");
            switch(avg) {
                case 1:
                    $(".fa-star").css("color", "black");
                    $("#s1").css("color", "#f7ea00");
                    break;
                case 2:
                    $(".fa-star").css("color", "black");
                    $("#s1, #s2").css("color", "#f7ea00");
                    break;
                case 3:
                    $(".fa-star").css("color", "black");
                    $("#s1, #s2, #s3").css("color", "#f7ea00");
                    break;
                case 4:
                    $(".fa-star").css("color", "black");
                    $("#s1, #s2, #s3, #s4").css("color", "#f7ea00");
                    break;
                case 5:
                    $(".fa-star").css("color", "black");
                    $("#s1, #s2, #s3, #s4, #s5").css("color", "#f7ea00");
                    break;
                default:
                    $(".fa-star").css("color", "black");

            }
           $("#s1").click(function(){
                $(".fa-star").css("color", "black");
                $("#s1").css("color", "#f7ea00");
                rating(1);
                $(".cmt").text("(trung bình: 1)");
           });
           $("#s2").click(function(){
                $(".fa-star").css("color", "black");
                $("#s1, #s2").css("color", "#f7ea00");
                rating(2);
                $(".cmt").text("(trung bình: 2)");
           });
           $("#s3").click(function(){
                $(".fa-star").css("color", "black");
                $("#s1, #s2, #s3").css("color", "#f7ea00");
                rating(3);
                $(".cmt").text("(trung bình: 3)");
           });
           $("#s4").click(function(){
                $(".fa-star").css("color", "black");
                $("#s1, #s2, #s3, #s4").css("color", "#f7ea00");
                rating(4);
                $(".cmt").text("(trung bình: 4)");
           });
           $("#s5").click(function(){
                $(".fa-star").css("color", "black");
                $("#s1, #s2, #s3, #s4, #s5").css("color", "#f7ea00");
                rating(5);
                $(".cmt").text("(trung bình: 5)");
           });
       })

       function rating(stars) {
            var name = "<?php echo $productDetails->name; ?>";
            $.get("/rating/" + name + "/" + stars, function (data) {

            });
       }
    </script>
@endsection
