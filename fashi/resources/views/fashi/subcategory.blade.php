@extends('fashi.layouts.master')

@section('content')


    <!----------------------------start sidebar----------------------- -->

    <div class="below-content">
        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
            @foreach ($categories as $category)
            @if ($category->status == 1)
                <div class="panel-group" id="accordion">
                    <div class="panel panel-warning" style="margin-bottom: -15px">
                    <div class="panel-heading"  style="background-color: #E7AB3C !important; color: #000000">
                        <h4 class="panel-title">
                        <a style="text-decoration: none;font-family:Georgia; font-weight: bold" data-toggle="collapse" data-parent="#accordion" href="#{{$category->url}}">
                        {{ $category->name}}</a>
                        </h4>
                    </div>
                    <div id="{{$category->url}}" class="panel-collapse collapse in" >
                        <ul class="list-group">
                            @foreach ($category->categories as $subcat)
                                @if ($subcat->status == 1 && $subcat->isDelete == 0)
                                <li  style="background-color: #FCF8E3 !important;" class="list-group-item">
                                    <a href="{{ url('/subcategories/'. $subcat->id)}}" style="color: #000000; text-decoration:none;font-family:Georgia">{{$subcat->name}}</a>
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


        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
            <!--start new product -->
            <div class="row">
                <div class="well text-center" style="background-color: #E7AB3C;font-family:Georgia"><span style="font-size: 30px; ">{{ $category_name->name}}</span></div>
            </div>
            <div class="row">
                @if (!empty($products))
                    @foreach ($products as $product)
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="card">
                                <a href="{{ url('/product/'.$product->id)}}">
                                    <img src="uploads/products/{{ $product->image }}" alt="Denim Jeans" style="width:100%">
                                </a>
                                <h5>{{ $product->name }}</h5>
                                <p class="price">${{ $product->discounted_price }}</p>
                                <p><a href="{{ url('/product/'.$product->id)}}" class="ViewDetail" style="width:100%;background-color:#E7AB3C;display:inline-block;cursor:pointer;color:#000000;font-family:Georgia;font-size:18px;font-weight:bold;font-style:italic;padding:11px 48px;text-decoration:none;">Xem chi tiết</a></p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
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


    </div>


    </div>


</div>
@endsection
