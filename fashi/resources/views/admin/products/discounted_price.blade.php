@extends('admin.layouts.master')
@section('title','Discounted Price Products')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-product-hunt"></i>
            </div>
            <div class="header-title">
                <h1>Giảm Giá Sản phẩm</h1>
                <small>Giảm giá sản phẩm</small>
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
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="btn-group" id="buttonexport">
                                <a href="#">
                                    <h4>Sản phẩm</h4>
                                </a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                            <div class="btn-group">
                                <div class="buttonexport" id="buttonlist">
                                    <a class="btn btn-add" href="{{ url('/admin/add-product') }}"> <i class="fa fa-plus"></i> Thêm sản phẩm
                                    </a>
                                </div>

                            </div>
                            <div class="btn-group">
                                <div class="buttonexport" id="buttonlist">
                                    <a class="btn btn-add" href="{{ url('/admin/view-products') }}"> <i class="fa fa-plus"></i> Xem sản phẩm
                                    </a>
                                </div>

                            </div>
                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                            <div class="table-responsive">
                                <table id="table_id" class="table table-bordered table-striped table-hover">
                                    <thead>
                                    <tr class="info">
                                        <th>ID</th>
                                        <th>Code</th>
                                        <th>Sản phẩm</th>
                                        <th>Mã loại</th>
                                        <th>Ảnh</th>
                                        <th>Giá</th>
                                        <th>Giá giảm</th>
                                        <th>Nhập giá giảm</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->code }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->category_id }}</td>

                                            <td>
                                                @if (!empty($product->image))
                                                    <img src="uploads/products/{{ $product->image }}" alt="" style="width:100px">
                                                @endif
                                            </td>
                                            <td>{{ $product->price }}</td>
                                            <td id="{{ $product->id }}-discount">{{ $product->discounted_price }}</td>
                                            <td>
                                                <input id="{{ $product->id }}" type="text" name="discounted_price" value="{{ $product->discounted_price }}">
                                                <button onclick="discounted({{$product->id}})" type="button" class="buttonupdate">Cập nhật</button>
                                            </td>

                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection

@section('script')
    <script>

        function discounted(idPro)
        {
            var discounted = $("#"+idPro).val();
            // đường dẫn này để đến AjaxController
            $.get("admin/discounted-price-product/" + idPro + "/" + discounted ,function (data) {
                $("#"+idPro + "-discount").text(data);
            });
        }

    </script>



@endsection
