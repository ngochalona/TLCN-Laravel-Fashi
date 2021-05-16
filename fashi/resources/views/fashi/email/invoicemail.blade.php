@component('mail::message')
@component('mail::header',['url' => 'abc', ['slot' => 'abc']])
    Thank You!!!
@endcomponent
Cảm ơn bạn đã đặt hàng tại Fashi shop. Chi tiết đơn hàng của bạn dưới đây.

@component('mail::panel')
    <b>Hóa đơn:</b> {{ $content['order_id'] }} <br>
    <b>Ngày tạo:</b> <?php $phpdate = strtotime( $content['productDetails']['created_at'] );
                            echo date( 'Y-m-d', $phpdate );  ?><br>
    <b>Trạng thái:</b> Đang xử lý
@endcomponent

@component('mail::panel')
Xin chào <b>{{ $content['name'] }}</b>, <br>
<b>Địa chỉ:</b> {{ $content['userDetails']['address'] }}, {{ $content['userDetails']['ward'] }}, {{ $content['userDetails']['state'] }}, {{ $content['userDetails']['city'] }} <br>
<b>Số điện thoại:</b> {{ $content['userDetails']['mobile'] }}
@endcomponent



@component('mail::promotion')
@component('mail::table')
|Sản phẩm                       |Size                           |Số lượng                      |Đơn giá                         |Tổng                                                       |
|-------------------------------|-------------------------------|-----------------------------|---------------------------------|-----------------------------------------------------------|
@foreach($content['productDetails']['orders'] as $product)
<?php
        $tong = 0;
    /** @var TYPE_NAME $product */
    $tong = ($product['product_qty']) * ($product['product_price']);
?>
| {{ $product['product_name'] }}| {{ $product['product_size'] }}| {{ $product['product_qty'] }}| {{ $product['product_price'] }}| {{$tong}}                                                 |
@endforeach
|&nbsp;                         |&nbsp;                         |&nbsp;                        |<b>Giảm giá: </b>               |{{ $content['productDetails']['coupon_amount'] }} VND      |
|&nbsp;                         |&nbsp;                         |&nbsp;                        |<b>Phí vận chuyển</b>           |{{ $content['productDetails']['shipping_charges'] }} VND   |
|&nbsp;                         |&nbsp;                         |&nbsp;                        |<b>Tổng tiền</b>                |{{ $content['productDetails']['grand_total'] }} VND        |
@endcomponent
@endcomponent


Nếu có thắc mắc xin liên hệ qua email: ngochalona18062018@gmail.com <br>
Trân trọng <br>
Fashi Shop <br>


@endcomponent
