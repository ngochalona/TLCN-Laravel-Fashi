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
                    <h2 style="font-family: 'Roboto Slab', serif; letter-spacing: 2px;">Đơn hàng đã đặt</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ url('/')}}">Trang chủ</a>
                        <a href="{{ url('/account')}}">Tài khoản</a>
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
            <h2 style="text-align: center; margin-bottom: 20px">Đơn hàng đã đặt</h2>
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Mã</th>
                  <th>Sản phẩm</th>
                  <th>Phương thức thanh toán</th>
                  <th>Tổng tiền</th>
                  <th>Ngày đặt</th>
                  <th>Hành động</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id}}</td>
                        <td>
                            @foreach ($order->orders as $pro)
                                <a href="{{url('/orders/'.$order->id)}}" style="text-decoration: none; color:#000000">{{$pro->product_code}} | {{$pro->product_qty}}</a>
                                <br>
                            @endforeach
                        </td>
                        <td>{{ $order->payment_method}}</td>
                        <td>{{ $order->grand_total}}</td>
                        <td>{{ $order->created_at}}</td>
                        <td>
                            <a href="{{url('/orders/'.$order->id)}}" style="text-decoration: none; color:#000000">Chi tiết</a><br>
                            @if($order->order_status == "Đang xử lý")
                                <a href="javascript:void(0)" id="{{$order->id}}" onclick="huyDon({{$order->id}})" style="text-decoration: none; color:#000000">Hủy đơn</a>
                            @endif
                        </td>
                    </tr>
                  @endforeach


              </tbody>
            </table>
          </div>
    </section>
    <!-- Shopping Cart Section End -->
@endsection
@section('script')
    <script>

        function huyDon(idOrder)
        {
            var result = confirm("Bạn có chắc chắn muốn hủy đơn?");
            if (result) {
                $.get("update-order-status-huydon/" + idOrder,function (data) {
                    alert("Đơn hàng " + idOrder  + " đã bị hủy");
                    $("#"+idOrder).remove();
                });
            }

        }


    </script>


@endsection
