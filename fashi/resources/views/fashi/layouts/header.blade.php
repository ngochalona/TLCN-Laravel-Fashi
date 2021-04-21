 <!-- Page Preloder -->
 <div id="preloder">
    <div class="loader"></div>
</div>

<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="{{ url('/')}}"><img src="front_assets/test/images/logo.png" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            @if (empty(Auth::check()))
                <li style="margin-bottom: 10px"><a href="{{ url('/userLogin')}}"><i class="fa fa-user"></i> <span style="color: #000; margin-left: 5px; font-size: medium;">Đăng nhập</span></a></li>
                <li><a href="{{ url('/userRegister')}}"><i class="fa fa-user-plus"></i> <span style="color: #000; margin-left: 5px; font-size: medium;">Đăng ký</span></a></li>
            @else
                <li style="margin-bottom: 10px"><a href="{{ url('/account')}}"><i class="fa fa-user"></i> <span style="color: #000; margin-left: 5px; font-size: medium;">Tài khoản</span></a></li>
                <li><a href="{{ url('/userLogout')}}"><i class="fa fa-lock"></i> <span style="color: #000; margin-left: 5px; font-size: medium;">Đăng xuất</span></a></li>
            @endif
        </ul>
    </div>

    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="{{ url('/')}}">Trang chủ</a></li>
            <li><a href="{{ url('/about')}}">Về chúng tôi</a></li>
            <li><a href="#">Loại sản phẩm</a>
                <ul class="header__menu__dropdown">
                    @foreach ($categoriess as $category)
                        @if ($category->status == 1)
                            <li><a href="{{ url('/categories/'. $category->id)}}">{{$category->name}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </li>
            <li><a href="{{ url('/blog')}}">Blog</a></li>
            <li><a href="{{ url('/contact')}}">Liên hệ</a></li>
            <li><a href="{{ url('/cart')}}">Giỏ</a></li>

        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>

</div>
<!-- Humberger End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="{{ url('/')}}"><img src="front_assets/test/images/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a class="home" href="{{ url('/')}}">Trang chủ</a></li>
                        <li><a class="about" href="{{ url('/about')}}">Chúng tôi</a></li>
                        <li><a class="blog" href="{{ url('/blog')}}">Blog</a></li>
                        <li><a class="contact" href="{{ url('/contact')}}">Liên hệ</a></li>
                        <li><a href="{{ url('/cart')}}">Giỏ</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        @if (empty(Auth::check()))
                            <li><a href="{{ url('/userLogin')}}"><i class="fa fa-user"></i> <span style="color: #000; margin-left: 5px; font-size: medium;">Đăng nhập</span></a></li>
                            <li><a href="{{ url('/userRegister')}}"><i class="fa fa-user-plus"></i> <span style="color: #000; margin-left: 5px; font-size: medium;">Đăng ký</span></a></li>
                        @else
                            <li><a href="{{ url('/account')}}"><i class="fa fa-user"></i> <span style="color: #000; margin-left: 5px; font-size: medium;">Tài khoản</span></a></li>
                            <li><a href="{{ url('/userLogout')}}"><i class="fa fa-lock"></i> <span style="color: #000; margin-left: 5px; font-size: medium;">Đăng xuất</span></a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->


