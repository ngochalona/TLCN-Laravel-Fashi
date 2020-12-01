@extends('fashi.layouts.master')

@section('content')

        <!-- Breadcrumb Section Begin -->
        <div class="breacrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text product-more">
                            <a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
                            <span>Blog</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section Begin -->
<div class="container">

    @foreach ($blogs as $blog)
        <div class="col-xs-6 col-sm-8 col-md-10 col-lg-12">
            <h2 style="text-align: center; letter-spacing: 2px;font-size: 43px; font-family:Georgia; font-weight: bold;text-transform: capitalize">{{ $blog->title }}</h2>
            <h3 style="text-align: center;color: #696969; font-family:Georgia;">Running Strong Since {{$blog->created_at}}</h3>
            <hr style="width: 200px; background-color: #E7AB3C; height:2px; ">
            <br>
            <img src="uploads/blogs/{{$blog->image}}" alt="" style="width: 1150px; height:500px">

            <div style="text-align: justify; font-size: 18px; margin-top: 20px; color: #696969; font-family:Georgia;">
                <p>{{$blog->content}}</p>
            </div>
            <hr>
        </div>
    @endforeach



</div>

@endsection
