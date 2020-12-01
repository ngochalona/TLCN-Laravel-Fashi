<!DOCTYPE html>
<html lang="en">
<head>
    <title>Kích hoạt tài khoản tại Fashi shop</title>
</head>
<body>
    <p>
        Chào {{ $name }}, <br>
        Click vào link phía dưới để kích hoạt tài khoản. <br>
        <a href="{{ url('confirm/'.$code)}}" target="blank">Kích hoạt tài khoản</a> <br>
        Trân trọng, <br>
        Fashi Team.
    </p>
</body>
</html>
