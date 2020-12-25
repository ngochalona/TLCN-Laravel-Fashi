@extends('fashi.layouts.master')

@section('content')

        <!-- Breadcrumb Section Begin -->
        <div class="breacrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text product-more">
                            <a href="{{url('/')}}"><i class="fa fa-home"></i> Trang chủ</a>
                            <span>Giỏ hàng</span>
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

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th class="p-name">Sản phẩm</th>
                                    <th>Size</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                    <th>X</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total_amount = 0; ?>
                                @foreach ($userCart as $cart)

                                    <tr>
                                        <td class="cart-pic first-row"><img style="width: 170px; height: 170px;  border-radius: 5%;" src="uploads/products/{{$cart->image}}" alt=""></td>
                                        <td class="cart-title first-row">
                                            <h5 class="product-name">{{$cart->product_name}}</h5>
                                        </td>
                                        <td class="p-price first-row">{{$cart->size}}</td>
                                        <td class="p-price first-row">${{$cart->price}}</td>
                                        <td class="quantity-box">

 <span   onclick="updateQuantityDec({{$cart->id}})"  style="font-size: 25px; color: black; cursor: pointer;">-</span>

 <input id="{{$cart->id}}" style="width:100px ;border: 2px solid #b2b2b2;text-align: center;padding:2px;font-size: 16px" type="text" size="4" value="{{$cart->quantity}}" min="0" step="1" class="c-input-text qty text" readonly>

 <span onclick="updateQuantityInc({{$cart->id}})"  style="font-size: 25px; color: black; cursor: pointer;">+</span>


                                            </td>
                                        <td class="total-price first-row" id="{{$cart->id}}-itemtotal">{{$cart->price * $cart->quantity}}</td>

                                        <td class="close-td first-row"><a style="color: black" href="{{url('/cart/delete-product/'.$cart->id)}}">X</a></td>
                                    </tr>
                                    <?php $total_amount += ($cart->price * $cart->quantity) ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="#" class="primary-btn up-cart" style="text-decoration: none; font-size: 14px;  text-transform: uppercase;">Tiếp tục mua sắm</a>
                            </div>
                            <div class="discount-coupon">
                                <h6 style="font-size: 16px;">Nhập mã giảm giá</h6>
                                <form action="{{url('/cart/apply-coupon')}}" method="post" class="coupon-form">{{csrf_field()}}
                                    <select name="coupon_code" id="" style=" width: 100%;height: 40px;padding: 5px;border: #d5d3d3 solid 2px;">
                                        <option value="">Enter your codes</option>
                                        @foreach($coupons as $coupon)
                                            <option value="{{ $coupon->coupon_code }}">{{ $coupon->coupon_code }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="site-btn coupon-btn" style="font-size: 14px;  text-transform: uppercase;">Áp dụng</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    <?php $coupon = 0  ?>
                                    <li class="subtotal">Tạm tính <span id="Subtotal">{{$total_amount}}</span></li>
                                @if (!empty(Session::get('CouponAmount')))
                                    <?php $coupon = Session::get('CouponAmount') ?>
                                @endif
                                    <li class="subtotal">Giảm giá <span id="coupon">{!! $coupon !!}</span></li>
                                    <li class="cart-total">Tổng tiền <span id="total">{!! $total_amount - $coupon !!}</span></li>
                                </ul>
                                <a href="{{url('/checkout')}}" class="proceed-btn" style="text-decoration: none;">TIẾN HÀNH ĐẶT HÀNG</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
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
                    document.getElementById("Subtotal").innerText = parseInt(subtotal);
                    document.getElementById("total").innerText = parseInt(subtotal) - parseInt(currentCoupon);
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
                            document.getElementById("Subtotal").innerText = parseInt(subtotal);
                            document.getElementById("total").innerText = parseInt(subtotal) - parseInt(currentCoupon);
                        });
                    }
                });

            }


        if(window.location.pathname === '/cart')
        {
            $(".home").css("background-color", "#222222");
            $(".about").css("background-color", "#222222");
            $(".cart_a").css("color", "#FFFFFF");
            $(".category").css("background-color", "#222222");
            $(".contact").css("background-color", "#222222");
            $(".blog").css("background-color", "#222222");
            $(".cart").css("background-color", "#E7AB3C");
        }

    </script>



@endsection

