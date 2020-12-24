@extends('fashi.layouts.master')

@section('content')

        <!-- Breadcrumb Section Begin -->
        <div class="breacrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text product-more">
                            <a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
                            <a href="{{url('/account')}}">Account</a>
                            <span>user order</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section Begin -->


    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <h2 style="text-align: center">Đơn hàng đã đặt</h2>
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
