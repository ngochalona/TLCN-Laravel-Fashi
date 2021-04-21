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
                    <h2 style="font-family: 'Roboto Slab', serif; letter-spacing: 2px;">Checkout</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ url('/')}}">Trang chủ</a>
                        <a href="{{ url('/cart')}}">Giỏ hàng</a>
                        <span>Checkout</span>
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



        <!-- Checkout Section Begin -->
        <section class="checkout spad">
            <div class="container">
                <div class="checkout__form">
                    <h4>Chi tiết đơn hàng</h4>
                    <form action="{{url('/checkout')}}" method="post" class="checkout-form"> {{csrf_field()}}
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="checkout__input">
                                    <p>Họ và tên<span>*</span></p>
                                    <input type="text" name="billing_name" id="billing_name" value="{{$userDetails->name}}">
                                </div>
                                <div class="checkout__input">
                                    <p>Địa chỉ<span>*</span></p>
                                    <input type="text"  name="billing_address" id="billing_address" value="{{$userDetails->address}}">
                                </div>
                                <div class="checkout__input">
                                    <p>Tỉnh / Thành<span>*</span></p>
                                    <input type="text"  name="billing_city" id="billing_city" value="{{$userDetails->city}}">
                                </div>
                                <div class="checkout__input">
                                    <p>Quận / Huyện<span>*</span></p>
                                    <input type="text" name="billing_state" id="billing_state" value="{{$userDetails->state}}">
                                </div>
                                <div class="checkout__input">
                                    <p>Phường / Xã<span>*</span></p>
                                    <input type="text" name="billing_ward" id="billing_ward" value="{{$userDetails->ward}}">
                                </div>
                                <div class="checkout__input">
                                    <p>Số điện thoại<span>*</span></p>
                                    <input type="text" name="billing_mobile" id="billing_mobile" value="{{$userDetails->mobile}}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="checkout__order">
                                    <h4>Đơn hàng</h4>
                                    <div class="shoping__cart__table">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="shoping__product">Sản phẩm</th>
                                                    <th>Size</th>
                                                    <th>Tổng</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $total_amount = 0;  ?>
                                            @foreach ($userCart as $cartitem)
                                                <tr>
                                                    <td class="shoping__cart__item">
                                                        <img src="uploads/products/{{$cartitem->image}}" style="width: 100px; height: 100px;  border-radius: 5%;" alt="">
                                                        <h5>{{$cartitem->product_name}}</h5>
                                                    </td>
                                                    <td class="shoping__cart__price">
                                                        {{$cartitem->size}}
                                                    </td>
                                                    <td class="shoping__cart__total">
                                                        {{$cartitem->price * $cartitem->quantity}}  VND
                                                    </td>
                                                </tr>
                                                <?php  $total_amount += ($cartitem->price *
                                                $cartitem->quantity); ?>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="checkout__order__subtotal">Tạm tính <span>{{$total_amount}} VND</span></div>
                                    <div class="checkout__order__total">Giảm giá
                                        <span style="color: #000">
                                        @if (!empty(Session::get('CouponAmount')))
                                        {{Session::get('CouponAmount') }} VND @else 0 VND @endif
                                      </span>
                                    </div>
                                    <div class="checkout__order__total">Thành tiền
                                        <span>
                                            {{ $grand_total = $total_amount - Session::get('CouponAmount') }} VND
                                        </span>
                                    </div>
                                    <div class="checkout__input">
                                        <input type="hidden" @if (empty($grand_total))
                                            value=0
                                        @else
                                            value="{{$grand_total}}"
                                        @endif  name="grand_total">
                                        <label for="town">Phương thức thanh toán</label>
                                        <div class="radio">
                                            <label style="font-size: 16px"><input style="height: 20px; width: 50px;" class="payment" id="credit" type="radio" value="cod" name="payment_method" class="cod" checked>Cash On Delivery</label>
                                        </div>
                                        <div class="radio">
                                            <label style="font-size: 16px"><input style="height: 20px; width: 50px;" class="payment" id="debit" type="radio" name="payment_method" value="stripe" class="stripe">Stripe</label>
                                        </div>
                                    </div>
                                    <button style="width: 300px; margin-top:20px;" type="submit" class="site-btn" onclick="return selectPaymentMethod();">ĐẶT HÀNG</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- Checkout Section End -->




@endsection
