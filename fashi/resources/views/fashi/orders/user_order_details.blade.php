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
                            <a href="{{url('/orders')}}">User Order</a>
                            <span>user order detail</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section Begin -->


    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <h2 style="text-align: center">User Order Details</h2>
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

