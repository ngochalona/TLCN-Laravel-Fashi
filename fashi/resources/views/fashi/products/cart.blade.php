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
                    <h2 style="font-family: 'Roboto Slab', serif; letter-spacing: 2px;">Giỏ hàng</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ url('/')}}">Trang chủ</a>
                        <span>Giỏ hàng</span>
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



<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Sản phẩm</th>
                                <th>Size</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng</th>
                                <th>X</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total_amount = 0; ?>
                            @foreach ($userCart as $cart)
                            <tr>
                                <td class="shoping__cart__item">
                                    <img src="uploads/products/{{$cart->image}}" style="width: 170px; height: 170px;  border-radius: 5%;" alt="">
                                    <h5>{{$cart->product_name}}</h5>
                                    @if ($cart->available == 0)
                                        <span>(hết hàng)</span>
                                    @endif
                                </td>
                                <td class="shoping__cart__price">
                                    {{$cart->size}}
                                </td>
                                <td class="shoping__cart__price">
                                    {{$cart->price}}
                                </td>
                                @if ($cart->available == 0)
                                    <td class="shoping__cart__quantity">
                                        <input id="{{$cart->id}}" style="width:100px ;border: 2px solid #b2b2b2;text-align: center;padding:2px;font-size: 16px" type="text" size="4" value="{{$cart->quantity}}" min="0" step="1" class="c-input-text qty text" readonly>
                                    </td>
                                @else
                                    <td class="shoping__cart__quantity">
                                        <span   onclick="updateQuantityDec({{$cart->id}})"  style="font-size: 25px; color: black; cursor: pointer;">-</span>

                                        <input id="{{$cart->id}}" style="width:100px ;border: 2px solid #b2b2b2;text-align: center;padding:2px;font-size: 16px" type="text" size="4" value="{{$cart->quantity}}" min="0" step="1" class="c-input-text qty text" readonly>

                                        <span onclick="updateQuantityInc({{$cart->id}})"  style="font-size: 25px; color: black; cursor: pointer;">+</span>
                                    </td>
                                @endif

                                @if ($cart->available == 0)
                                    <td class="shoping__cart__total">
                                        0  VND
                                    </td>
                                @else
                                    <td class="shoping__cart__total" id="{{$cart->id}}-itemtotal">
                                        {{$cart->price * $cart->quantity}}  VND
                                    </td>
                                @endif

                                <td class="shoping__cart__item__close">
                                    <a style="color: black" href="{{url('/cart/delete-product/'.$cart->id)}}">X</a>
                                </td>
                            </tr>
                            <?php

                                if ($cart->available != 0)
                                    $total_amount += ($cart->price * $cart->quantity)
                            ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{url('/')}}" class="primary-btn cart-btn">TIẾP TỤC MUA SẮM</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Mã giảm giá</h5>
                        <form action="{{url('/cart/apply-coupon')}}" method="post" class="coupon-form">{{csrf_field()}}
                            <select name="coupon_code" id="" >
                                <option value="">Chọn mã giảm giá</option>
                                @foreach($coupons as $coupon)
                                    <option value="{{ $coupon->coupon_code }}">{{ $coupon->coupon_code }}</option>
                                @endforeach
                            </select>
                            <button style="margin-left: 20px; height: 50px" type="submit" class="site-btn">ÁP DỤNG</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Tổng tiền</h5>
                    <ul>
                        <?php $coupon = 0  ?>

                        <li>Tạm tính <span id="Subtotal">{{$total_amount}}  VND</span></li>
                        @if (!empty(Session::get('CouponAmount')))
                            <?php $coupon = Session::get('CouponAmount') ?>
                        @endif
                            <li>Giảm giá <span id="coupon">{!! $coupon !!}  VND</span></li>
                            <li>Thành tiền <span id="total">{!! $total_amount - $coupon !!} VND</span></li>
                    </ul>
                    <a href="{{url('/checkout')}}" class="primary-btn">TIẾN HÀNH ĐẶT HÀNG</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->
@endsection


@section('script')
    <script>

            function updateQuantityDec(idCart)
            {
                 $.get("cart/update-quantity-dec/" + idCart,function (data) {
                    var currentItemTotal = document.getElementById(idCart+"-itemtotal").innerText;

                    var currentSubtotal = document.getElementById("Subtotal").innerText;
                    var currentCoupon = document.getElementById("coupon").innerText;
                   // var currentTotal = document.getElementById("total").innerText;



                    var vt = data.search("-");
                    var sl = data.substring(0,vt);//
                    var gia = data.substring(vt+1,data.length);

                    var itemTotal = sl * gia;
                    $("#"+idCart).val(sl);//
                    document.getElementById(idCart+"-itemtotal").innerText = itemTotal;

                    var subtotal = parseInt(currentSubtotal) - parseInt(currentItemTotal) + parseInt(itemTotal);
                    document.getElementById("Subtotal").innerText = parseInt(subtotal) + ' VND';
                    var total = parseInt(subtotal) - parseInt(currentCoupon);
                    document.getElementById("total").innerText = total + ' VND';
                 });
            }
            function updateQuantityInc(idCart)
            {

                $.get("cart/get-product-stock/" + idCart,function (data) {
                    var stock = data;
                    var currentQty = parseInt($("#"+idCart).val());
                    if(currentQty + 1 > stock)
                    {
                        alert('Không đủ hàng');
                    }
                    else
                    {
                        $.get("cart/update-quantity-inc/" + idCart,function (data) {
                            var currentItemTotal = document.getElementById(idCart+"-itemtotal").innerText;

                            var currentSubtotal = document.getElementById("Subtotal").innerText;
                            var currentCoupon = document.getElementById("coupon").innerText;



                            var vt = data.search("-");
                            var sl = data.substring(0,vt);
                            var gia = data.substring(vt+1,data.length);

                            var itemTotal = sl * gia;
                            $("#"+idCart).val(sl);
                            document.getElementById(idCart+"-itemtotal").innerText = itemTotal;

                            var subtotal = parseInt(currentSubtotal) - parseInt(currentItemTotal) + parseInt(itemTotal);
                            document.getElementById("Subtotal").innerText = parseInt(subtotal) + ' VND';
                            var total = parseInt(subtotal) - parseInt(currentCoupon);
                            document.getElementById("total").innerText = total + ' VND';
                        });
                    }
                });

            }

    </script>



@endsection

