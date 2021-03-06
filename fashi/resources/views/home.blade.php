@extends('fashi.layouts.master')

@section('content')



<!---------------------------- start slider----------------------- -->

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
<?php for($i=1; $i<= $countBanners; $i++) {?>
    <li data-target="#myCarousel" data-slide-to="{!!$i!!}"></li>
<?php } ?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="front_assets/images/slide-1.jpg" alt="Chania">
            <div class="carousel-caption">
                <h1 style="color: #000000; text-transform: uppercase; letter-spacing: 2px">fashi clothes shop</h1>
                <p style="color: #000000; font-size: 20px; letter-spacing: 1px" >Fashi is always so much fun!</p>
            </div>
        </div>
    @foreach ($banners as $banner)
        <div class="item">
            <img src="uploads/banners/{{ $banner->image }}" alt="Chicago">
            <div class="carousel-caption">
                <h1 style="color: #000000; text-transform: uppercase; letter-spacing: 2px">{{ $banner->name }}</h1>
                <p style="color: #000000; font-size: 20px; letter-spacing: 1px">{{ $banner->content }}</p>
            </div>
        </div>
    @endforeach


        {{-- <div class="item">
            <img src="front_assets/images/slide-3.jpg" alt="New York">
            <div class="carousel-caption">
                <h3>New York</h3>
                <p>We love the Big Apple!</p>
            </div>
        </div> --}}
    </div>

    <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
        </a>
</div>

<!---------------------------- end slider----------------------- -->








    <!----------------------------start sidebar----------------------- -->
    <div class="below-content">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            @foreach ($categories as $category)
            @if ($category->status == 1)
                <div class="panel-group" id="accordion">
                    <div class="panel panel-warning" style="margin-bottom: -15px">
                    <div class="panel-heading"  style="background-color: #E7AB3C !important; color: #000000">
                        <h4 class="panel-title">
                        <a style="text-decoration: none;" data-toggle="collapse" data-parent="#accordion" href="#{{$category->url}}">
                        {{ $category->name}}</a>
                        </h4>
                    </div>
                    <div id="{{$category->url}}" class="panel-collapse collapse in" >
                        <ul class="list-group">
                            @foreach ($category->categories as $subcat)
                            @if ($subcat->status == 1)
                                <li  style="background-color: #FCF8E3 !important;" class="list-group-item">
                                    <a href="{{ url('/subcategories/'. $subcat->id)}}" style="color: #000000; text-decoration:none;">{{$subcat->name}}</a>
                                </li>
                            @endif

                            @endforeach
                        </ul>
                    </div>
                    </div>

                </div>
            @endif

            @endforeach


              <div class="card card-price">
                <div class="card-img">
                  <a href="#">
                    <img src="front_assets/images/women-large.jpg" class="img-responsive">
                    <div class="card-caption">
                      <span class="h2 text-center">Big Item</span>
                      <p>100% silk</p>
                    </div>
                  </a>
                </div>

              </div>
        </div>
<!----------------------------end sidebar----------------------- -->

        <!------------------------ sản phẩm ------------------------->
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <!--start new product -->
            <div class="row">
                <div class="well text-center" style="background-color: #E7AB3C;"><span style="font-size: 30px; ">New Products</span></div>
            </div>
            <div class="row">
                @if (!empty($newProducts))
                    @foreach ($newProducts as $product)
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="card">
                                <a href="{{ url('/product/'.$product->id)}}">
                                    <img src="uploads/products/{{ $product->image }}" alt="Denim Jeans" style="width:100%">
                                </a>
                                <h5>{{ $product->name }}</h5>
                                <p class="price">${{ $product->price }}</p>
                                <p><a style="color: black; ">Add to Cart</a></p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            {{ $newProducts->links() }}
             <!--end new product -->
            <!-- start hình -->
            <div class="row" style="margin-top: 70px; margin-bottom: 70px;">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <img src="front_assets/images/banner-1.jpg" class="img-rounded" alt="Cinque Terre"  width="304" height="200">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <img src="front_assets/images/banner-2.jpg" class="img-rounded" alt="Cinque Terre"  width="304" height="200">
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <img src="front_assets/images/banner-3.jpg" class="img-rounded" alt="Cinque Terre"  width="304" height="200">
                    </div>

            </div>

            <!-- end hình -->
            <!-- start hot product -->

            <div class="row">
                <div class="well text-center" style="background-color: #E7AB3C;"><span style="font-size: 30px; ">Hot Products</span></div>
            </div>
            <div class="row">
                @if (!empty($hotProducts))
                    @foreach ($hotProducts as $product)
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="card">
                                <a href="{{ url('/product/'.$product->id)}}">
                                    <img src="uploads/products/{{ $product->image }}" alt="Denim Jeans" style="width:100%">
                                </a>
                                <h5>{{ $product->name }}</h5>
                                <p class="price">${{ $product->price }}</p>
                                <p><button>Add to Cart</button></p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            {{ $hotProducts->links() }}
            <!-- end hot product -->

    </div>
    </div>

    <!-- ----------------------hết sp -------------------------------->
    </div>



</div>
@endsection


