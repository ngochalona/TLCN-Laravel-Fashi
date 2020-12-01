<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="{{ asset('')}}">
    <link rel="stylesheet" type="text/css" href="front_assets/css/style.css" >
    <link rel="stylesheet" type="text/css" href="front_assets/css/bootstrap.min.css" >
    <link href="http://getbootstrap.com/examples/navbar-fixed-top/navbar-fixed-top.css" rel="stylesheet">

    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="front_assets/slider/style.css">




    <script src="https://kit.fontawesome.com/81dd6e8cf7.js" crossorigin="anonymous"></script>

    <title>Fashi Shop</title>


</head>
<body>
    @include('fashi.layouts.header')

    @yield('content')

    @include('fashi.layouts.footer')


    <script type="text/javascript" src="front_assets/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="front_assets/js/bootstrap.min.js"></script>
    <script src="front_assets/js/main.js"></script>
    <script>
        $(document).ready(function(){
            $("#selSize").change(function(){
                var idSize = $(this).val();

                if(idSize == "")
                {
                    return false;
                }
                $.ajax({
                    type: 'get',
                    url: 'get-product-stock',
                    data: {idSize: idSize},
                    success:function(resp){
                        $('#showStock').val(resp);
                        if(resp <= 0)
                        {
                            $('#addToCart').text("HẾT HÀNG");
                            $('#addToCart').prop('disabled', true);
                        }
                        else
                        {
                            var qty = parseInt($('#quantity').val());
                            if( qty > resp)
                            {
                                $('#addToCart').text("KHÔNG ĐỦ HÀNG");
                                $('#addToCart').prop('disabled', true);
                            }
                            else
                            {
                                $('#addToCart').text("THÊM VÀO GIỎ HÀNG");
                                $('#addToCart').prop('disabled', false);
                            }

                        }

                    }, error:function(){
                        alert("Bạn chưa chọn size");
                    }
                });
            });

        });
        function selectPaymentMethod(){
            if($('.stripe').is(':checked') || $('.cod').is(':checked'))
            {
                //alert("check");
            }
        }
    </script>
    @yield('script')
</body>
</html>



