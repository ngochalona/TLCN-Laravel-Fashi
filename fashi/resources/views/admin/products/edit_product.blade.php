@extends('admin.layouts.master')
@section('title','Edit Product')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-product-hunt"></i>
        </div>
        <div class="header-title">
            <h1>Edit Product</h1>
            <small>Edit Product</small>
        </div>
    </section>
@if (Session::has('flash_message_error'))
<div class="alert alert-danger alert-block" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>{!! session('flash_message_error') !!}</strong>
</div>
@endif

@if (Session::has('flash_message_success'))
    <div class="alert alert-success alert-block" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>{!! session('flash_message_success') !!}</strong>
    </div>
@endif
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- Form controls -->
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                    <div class="btn-group" id="buttonlist">
                        <a class="btn btn-add " href="{{ url('/admin/view-products/') }}">
                        <i class="fa fa-eye"></i>  View Products </a>
                    </div>
                </div>
                <div class="panel-body">
                    <form class="col-sm-6" action="{{ url('/admin/edit-product/'.$productDetails->id)}}" method="post" enctype="multipart/form-data"> {{csrf_field()}}
                        {{-- <div class="form-group">
                            <label>Under Category</label>
                            <select name="category_id" id="category_id" class="form-control">

                                {!! $category_dropdown !!}
                            </select>
                        </div> --}}
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" class="form-control" value="{{$productDetails->name}}" name="product_name" id="product_name" required>
                        </div>
                        <div class="form-group">
                            <label>Product Code</label>
                            <input type="text" class="form-control"  value="{{$productDetails->code}}" name="product_code" id="product_code" required>
                        </div>
                        <div class="form-group">
                            <label>Product Desciption</label>
                            <textarea class="form-control" name="product_description" id="product_description">
                               {{$productDetails->description}}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Product Price</label>
                            <input type="text" class="form-control"  value="{{$productDetails->price}}"  name="product_price" id="product_price" required>
                        </div>
                        <div class="form-group">
                            <label>Picture upload</label>
                            <input type="file" name="image">
                            <input type="hidden" name="current_image" value="{{$productDetails->image}}">

                            @if (!empty($productDetails->image))
                                <img style="width:100px; margin-top:10px;" src="uploads/products/{{ $productDetails->image }}" alt="">
                            @endif

                        </div>
                        <div class="reset-button">
                            <input type="submit" class="btn btn-success" value="Update Product">
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection


