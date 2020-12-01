<div class="container-fuild">

    <!---------------------------- start menu----------------------- -->
    <div class="container">
        <nav class="navbar navbar-default menu">
            <div class="container-fluid">
               <!-- Brand and toggle get grouped for better mobile display -->
               <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="{{ url('/')}}"><img src="front_assets/images/logo.png"></a>
               </div>
               <!-- Collect the nav links, forms, and other content for toggling -->
               <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                  <ul class="nav navbar-nav navbar-right">
                    <li>
                        <form class="navbar-form" action="{{ url('/timkiem')}}" method="post"> {{csrf_field()}}
                            <div class="form-group">
                              <input name="tukhoa" type="text" class="form-control" placeholder="Nhập từ khóa sản phẩm ">
                            </div>
                            <button type="submit" class="btn btn-default btnSearch">Tìm kiếm</button>
                        </form>
                    </li>

                    @if (empty(Auth::check()))
                        <li><a href="{{ url('/userLogin')}}"><i class="fas fa-user" style="margin-right: 8px;"></i>Đăng nhập</a></li>
                        <li><a href="{{ url('/userRegister')}}"><i class="fas fa-user-plus"  style="margin-right: 10px;"></i>Đăng ký</a></li>
                    @else
                        <li><a href="{{ url('/account')}}"><i class="fas fa-user"  style="margin-right: 10px;"></i>Tài khoản</a></li>
                        <li><a href="{{ url('/userLogout')}}"><i class="fas fa-lock"  style="margin-right: 10px;"></i>Đăng xuất</a></li>
                    @endif
                  </ul>
               </div>
               <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
         </nav>
    </div>

    <nav class="navbar navbar-inverse menu1">
        <div class="container-fluid">
           <!-- Brand and toggle get grouped for better mobile display -->
           <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              </button>

           </div>
           <!-- Collect the nav links, forms, and other content for toggling -->
           <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
              <ul class="nav navbar-nav">
                 <li class="active menu_item"><a href="{{ url('/')}}">Trang chủ </a></li>
                 <li class="menu_item"><a href="{{ url('/about')}}">Về chúng tôi</a></li>
                 <li class="dropdown menu_item">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sản phẩm<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @foreach ($categoriess as $category)
                            @if ($category->status == 1)
                                <li><a href="{{ url('/categories/'. $category->id)}}">{{$category->name}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                 </li>
                 <li class="menu_item"><a href="{{ url('/blog')}}">Blog</a></li>
                 <li class="menu_item"><a href="{{ url('/contact')}}">Liên hệ</a></li>

              </ul>


              <ul class="nav navbar-nav">
                <li class="menu_item">
                    <a href="{{ url('/cart')}}"> <span class="glyphicon glyphicon-shopping-cart" style="margin-right: 10px"></span>Giỏ hàng<span></span></a>

                </li>

                </ul>
           <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
     </nav>


<!---------------------------- end menu----------------------- -->

</div>











