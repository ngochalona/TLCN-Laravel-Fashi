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
                    <h2 style="font-family: 'Roboto Slab', serif; letter-spacing: 2px;">Chi tiết đơn hàng</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ url('/')}}">Trang chủ</a>
                        <a href="{{ url('/account')}}">Tài khoản</a>
                        <a href="{{ url('/orders')}}">Tổng đơn</a>
                        <span>Đơn hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->


    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <h2 style="text-align: center; margin-bottom: 20px">Chi tiết đơn hàng mã số {{$order_id}}</h2>
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Product Code</th>
                  <th>Product Name</th>
                  <th>Product Size</th>
                  <th>Product Price</th>
                  <th>Product Quantity</th>
                  <th>Order Status</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($orderDetails->orders as $pro)
                    <tr>
                        <td>{{ $pro->product_code}}</td>
                        <td>{{ $pro->product_name}}</td>
                        <td>{{ $pro->product_size}}</td>
                        <td>{{ $pro->product_price}}</td>
                        <td>{{ $pro->product_qty}}</td>
                        <td>{{ $orderDetails->order_status}}</td>
                    </tr>
                  @endforeach


              </tbody>
            </table>
          </div>
    </section>
    <!-- Shopping Cart Section End -->
@endsection

