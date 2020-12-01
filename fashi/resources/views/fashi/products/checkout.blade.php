@extends('fashi.layouts.master')

@section('content')
     <!-- Breadcrumb Section Begin -->
     <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
                        <a href="{{url('/cart')}}">Cart</a>
                        <span>CheckOut</span>
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
        @if (count($errors)>0)
        @foreach($errors->all() as $err)
            <div class="alert alert-danger alert-block" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>{{$err}}</strong>
            </div>
        @endforeach
    @endif
    </div>


    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">
        <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <a href="{{url('/checkout')}}" style="text-decoration: none;" class="content-btn">SẢN PHẨM ĐẶT HÀNG</a>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-table">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Ảnh</th>
                                                <th class="p-name" style="text-align: center;">Tên</th>
                                                <th>Giá</th>
                                                <th>Số lượng</th>
                                                <th>Tổng</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $total_amount = 0;  ?>
                                        @foreach ($userCart as $cartitem)


                                            <tr>
                                                <td class="cart-pic first-row"><img style="width: 80px; height: 80px;  border-radius: 5%;" src="uploads/products/{{$cartitem->image}}" alt=""></td>
                                                <td class="cart-title first-row" style="text-align: center;">
                                                    <h5 class="product-name">{{$cartitem->product_name}}</h5>
                                                </td>
                                                <td class="p-price first-row">${{$cartitem->price}}</td>
                                                <td class="cart-title first-row">
                                                    <h5 class="product-name" style="text-align: center;">{{$cartitem->quantity}}</h5>
                                                </td>
                                                <td class="total-price first-row">${{$cartitem->price * $cartitem->quantity}}</td>
                                            </tr>

                                            <?php  $total_amount += ($cartitem->price * $cartitem->quantity);  ?>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="proceed-checkout">
                                            <ul>
                                                <li class="cart-total" style="text-align: center; font-size: 18px">Thanh toán</li>
                                                <li class="subtotal" style="margin-top: 15px;">Tạm tính <span>{{$total_amount}} VND</span></li>
                                                <li class="subtotal" style="margin-top: 15px;">Phí vận chuyển <span>0 VND</span></li>
                                                <li class="subtotal" style="margin-top: 15px;">Giảm giá
                                                    <span>
                                                        @if (!empty(Session::get('CouponAmount')))
                                                            {{Session::get('CouponAmount') }} VND
                                                        @else
                                                            0 VND
                                                        @endif
                                                    </span>

                                                </li>
                                                <li class="cart-total" >Thành tiền <span>{{ $grand_total = $total_amount - Session::get('CouponAmount') }} VND</span></li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <a href="{{url('/checkout')}}" style="text-decoration: none;" class="content-btn">THÔNG TIN GIAO HÀNG</a>
                        </div>
                        <form action="{{url('/checkout')}}" method="post" class="checkout-form"> {{csrf_field()}}
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="fir">Họ và tên<span>*</span></label>
                                    <input type="text" name="billing_name" id="billing_name" value="{{$userDetails->name}}">
                                </div>
                                <div class="col-lg-12">
                                    <label for="last">Địa chỉ<span>*</span></label>
                                    <input type="text"  name="billing_address" id="billing_address" value="{{$userDetails->address}}">
                                </div>
                                <div class="col-lg-12">
                                    <label for="cun-name">Tỉnh / Thành<span>*</span></label>
                                    <input type="text"  name="billing_city" id="billing_city" value="{{$userDetails->city}}">
                                </div>
                                <div class="col-lg-12">
                                    <label for="cun">Quận / Huyện<span>*</span></label>
                                    <input type="text" name="billing_state" id="billing_state" value="{{$userDetails->state}}">
                                </div>
                                <div class="col-lg-12">
                                    <label for="cun">Phường / Xã<span>*</span></label>
                                    <input type="text" name="billing_ward" id="billing_ward" value="{{$userDetails->ward}}">
                                </div>
                                <div class="col-lg-12">
                                    <label for="town">Số điện thoại<span>*</span></label>
                                    <input type="text" name="billing_mobile" id="billing_mobile" value="{{$userDetails->mobile}}">
                                </div>

                                <div class="col-lg-12">
                                    <input type="hidden" value="{{$grand_total}}" name="grand_total">
                                    <label for="town">Phương thức thanh toán</label>
                                    <div class="radio">
                                        <label style="font-size: 16px"><input class="payment" id="credit" type="radio" value="cod" name="payment_method" class="cod" checked>Cash On Delivery</label>
                                    </div>
                                    <div class="radio">
                                        <label style="font-size: 16px"><input class="payment" id="debit" type="radio" name="payment_method" value="stripe" class="stripe">Stripe</label>
                                    </div>
                                    <div class="order-btn">
                                        <button style="width: 300px; margin-top:20px;" type="submit" class="site-btn login-btn dangnhap" onclick="return selectPaymentMethod();">ĐẶT HÀNG</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

        </div>
    </section>
    <!-- Shopping Cart Section End -->
@endsection
