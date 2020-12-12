@extends('fashi.layouts.master')

@section('content')
        <!-- Breadcrumb Section Begin -->
        <div class="breacrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text product-more">
                            <a href="{{ url('/')}}"><i class="fa fa-home"></i> Home</a>
                            <span>product detail</span>
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
</div>

        <!-- product details -->
        <div class="container">
            <div class="row" >
                <div class="col-lg-6" style="margin-top: 20px;">
                    <div class="col-lg-offset-2">
                        <div class="product-pic-zoom">
                            <img class="product-big-img" src="uploads/products/{{$productDetails->image}}" alt="">
                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
            <form name="addtoCart" action="{{ url('/add-cart')}}" method="post">{{csrf_field()}}
                    <div class="product-details">
                        <input type="hidden" value="{{$productDetails->id}}" name="product_id">
                        <input type="hidden" value="size" id="showStock">
                        <input type="hidden" value="{{$productDetails->name}}" name="product_name">
                        <input type="hidden" value="{{$productDetails->code}}" name="product_code">
                        <input type="hidden" id="price" value="{{$productDetails->discounted_price}}" name="price">
                        <div class="pd-title">
                            <h3>{{$productDetails->name}}</h3>
                            <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                        </div>

                        <div class="pd-desc">
                            <p>{!! $productDetails->description !!}</p>
                            <h4 id="getPrice">Giá: {{$productDetails->discounted_price}} VND<span>{{$productDetails->price}} VND</span></h4>
                        </div>

                        <div class="form-group">
                            <select class="form-control"  id="selSize" name="size"  style="border: 2px solid #E7AB3C; line-height: 40px; font-size: 16px;	height: 40px;width: 122px;cursor: pointer;font-weight: 700;">
                                <option value="0">Size</option>
                                @foreach ($productDetails->attributes as $sizes)
                                    <option value="{{$productDetails->id}}-{{$sizes->size}}">{{$sizes->size}}</option>
                                @endforeach
                            </select>
                          </div>

                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="text" id="quantity" value="1" name="quantity">
                            </div>
                            <button id="addToCart" type="submit" style="color: #000000"  class="myButton">THÊM VÀO GIỎ HÀNG</button>
                        </div>
                    </div>
            </form>
                </div>
            </div>
        </div>

        <!-- end product details -->
        <!-- related products -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="well text-center" style="background-color: #E7AB3C; margin-top: 50px;font-family:Georgia;"><span style="font-size: 30px; ">SẢN PHẨM LIÊN QUAN</span></div>
                </div>
            </div>
            <div class="row">
                @if (!empty($relatedProducts))
                    @foreach ($relatedProducts as $product)
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="card">
                                <a href="{{ url('/product/'.$product->id)}}">
                                    <img src="uploads/products/{{ $product->image }}" alt="Denim Jeans" style="width:100%">
                                </a>
                                <h5>{{ $product->name }}</h5>
                                <p class="price">${{ $product->discounted_price }}</p>
                                <p><a href="{{ url('/product/'.$product->id)}}" class="ViewDetail" style="width:100%;background-color:#E7AB3C;display:inline-block;cursor:pointer;color:#000000;font-family:Georgia;font-size:18px;font-weight:bold;font-style:italic;padding:11px 48px;text-decoration:none;">Xem chi tiết</a></p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

@endsection
