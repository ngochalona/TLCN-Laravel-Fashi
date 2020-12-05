<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header">
            Hóa đơn số <strong>{{ $order_id }}</strong>
            <div>Ngày tạo: {{ $productDetails['created_at'] }}</div>
            <div>Trạng thái: Đang xử lý</div>

        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-sm-12">
                    Xin chào {{ $name }}, <br>
                    Địa chỉ: {{ $userDetails['address'] }}, {{ $userDetails['ward'] }}, {{ $userDetails['state'] }}, {{ $userDetails['city'] }}
                    Số điện thoại: {{ $userDetails['mobile'] }}
                    Cảm ơn bạn đã đặt hàng tại Fashi shop. Chi tiết đơn hàng của bạn dưới đây.
                </div>
            </div>

            <div class="table-responsive-sm">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Size</th>
                        <th>Số lượng</th>

                        <th>Đơn giá</th>
                        <th>Tổng</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($productDetails['orders'] as $product)
                        <tr>
                            <td>{{ $product['product_name'] }}</td>
                            <td>{{ $product['product_size'] }}</td>
                            <td>{{ $product['product_qty'] }}</td>
                            <td>{{ $product['product_price'] }}</td>
                            <?php
                                $tong = 0;
                            /** @var TYPE_NAME $product */
                            $tong = ($product['product_qty']) * ($product['product_price']);
                            ?>
                            <td class="center">{{ $tong }} VND</td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-5">

                </div>

                <div class="col-lg-4 col-sm-5 ml-auto">
                    <table class="table table-clear">
                        <tbody>
                        <tr>
                            <td class="left">
                                <strong>Giảm giá</strong>
                            </td>
                            <td class="right">{{ $productDetails['coupon_amount'] }} VND</td>
                        </tr>
                        <tr>
                            <td class="left">
                                <strong>Phí vận chuyển</strong>
                            </td>
                            <td class="right">{{ $productDetails['shipping_charges'] }} VND</td>
                        </tr>
                        <tr>
                            <td class="left">
                                <strong>Tổng tiền</strong>
                            </td>
                            <td class="right">
                                <strong>{{ $productDetails['grand_total'] }} VND</strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>

            </div>

            <div>Nếu có thắc mắc xin liên hệ qua email: ngochalona18062018@gmail.com</div>
            <div>Trân trọng</div>
            <div>Fashi Shop</div>
        </div>
    </div>
</div>
</body>
</html>
