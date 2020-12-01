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
            <h2 style="text-align: center">User Orders</h2>
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Ordered Product</th>
                  <th>Payment Method</th>
                  <th>Grand Total</th>
                  <th>Order Date</th>
                  <th>Action</th>
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
                        <td><a href="{{url('/orders/'.$order->id)}}" style="text-decoration: none; color:#000000">View Details</a></td>
                    </tr>
                  @endforeach


              </tbody>
            </table>
          </div>
    </section>
    <!-- Shopping Cart Section End -->
@endsection

