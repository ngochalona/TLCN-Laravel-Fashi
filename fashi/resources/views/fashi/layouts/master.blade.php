<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="{{ asset('')}}">
    <title>Fashi for all</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="front_assets/test/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="front_assets/test/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="front_assets/test/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="front_assets/test/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="front_assets/test/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="front_assets/test/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="front_assets/test/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="front_assets/test/css/style.css" type="text/css">
    <script src="front_assets/test/js/fontawesomekit.js" crossorigin="anonymous"></script>

<style>
    body{
        font-family: 'Roboto Slab', serif;
    }
</style>
</head>
<body>
    @include('fashi.layouts.header')

    @yield('content')

    @include('fashi.layouts.footer')


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


    <!-- Js Plugins -->
    <script src="front_assets/test/js/jquery-3.3.1.min.js"></script>
    <script src="front_assets/test/js/bootstrap.min.js"></script>
    <script src="front_assets/test/js/jquery.nice-select.min.js"></script>
    <script src="front_assets/test/js/jquery-ui.min.js"></script>
    <script src="front_assets/test/js/jquery.slicknav.js"></script>
    <script src="front_assets/test/js/mixitup.min.js"></script>
    <script src="front_assets/test/js/owl.carousel.min.js"></script>
    <script src="front_assets/test/js/main.js"></script>
</body>

</html>



