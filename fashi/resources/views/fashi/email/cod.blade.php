<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mail xác nhận đơn hàng</title>
</head>
<body>
    <div style="border-top-left-radius: 3px; border-top-right-radius: 3px; padding: 10px 15px; background-color: #428bca; border-color: #428bca; color: #fff" class="v1panel-heading">
        Bạn có mail nhận hàng từ Fashi shop
         </div>

    {{-- <table> --}}

    {{-- <tr><td>Chào {{ $name }}</td></tr>
    <tr> <td>Cảm ơn bạn đã đặt hàng. Thông tin đơn hàng chi tiết dưới đây</td> </tr>
    <tr><td><h1>Mã đơn hàng : {{ $order }}</h1></td>  </tr>
    </table>
    <table width="100%" cellpadding="5" cellspacing="5" border="1px">

            <tr>
                <td>Product Name</td>
                <td>Product Code</td>
                <td>Size</td>
                <td>Quantity</td>
                <td>Unit Price</td>
                <td>Total Price</td>
            </tr>

            @foreach ($productDetails as $item)

            @endforeach
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->code }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->name }}</td>
            </tr>

            <tr>
                <td colspan="6" align="right"><strong>Shipping Charges (+)</strong></td>  <td>  PKR 0</td>
            </tr>
            <tr>
                <td colspan="6" align="right"><strong>Coupon Discount (-) </strong></td>  <td>PKR 0</td>
            </tr>
            <tr>
                <td colspan="6" align="right"><strong>Grand Total</td>  </strong><td>PKR 500</td>
            </tr>
    </table>
    <h4>Thông tin giao hàng: </h4> <br>

       <div class="billto" style="width:50%;float:left">
        <b>Địa chỉ giao hàng</b> <br><br>
           <strong>Tên khách hàng : </strong>{{ $name }} <br>
           <strong>Địa chỉ : </strong>{{ $userDetails->address}}, {{ $userDetails->ward}}, {{ $userDetails->state}}, {{ $userDetails->city}} <br>
           <strong>Số điện thoại : </strong>{{ $userDetails->mobile}} <br>
       </div>

    </div><br><br><br><br>

   <div>
    <p>Chú ý: Mọi thắc mắc liên hệ qua email <a href="mailto:ngochalona1862018@gmail.com">ngochalona1862018@gmail.com</a></p>
    <br>
    <b>Trân trọng</b> <br>
    Fashi Team --}}
   {{-- </div> --}}
</body>
</html>
