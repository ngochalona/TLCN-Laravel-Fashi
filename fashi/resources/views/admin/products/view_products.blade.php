@extends('admin.layouts.master')
@section('title','View Products')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="header-icon">
          <i class="fa fa-product-hunt"></i>
       </div>
       <div class="header-title">
          <h1>Sản phẩm</h1>
          <small>Danh sách sản phẩm</small>
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

    <div id="message_success" style="display:none;" class="alert alert-sm alert-success">Status Enabled</div>
    <div id="message_error" style="display:none;" class="alert alert-sm alert-danger">Status Disabled</div>

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
                       <a class="btn btn-add" href="{{ url('/admin/restore-product') }}"> <i class="fa fa-plus"></i> Khôi phục
                       </a>
                    </div>
                   </div>
                    <div class="btn-group">
                        <div class="buttonexport" id="buttonlist">
                            <a class="btn btn-add" href="{{ url('/admin/discounted-price') }}"> <i class="fa fa-plus"></i> Nhập giá giảm
                            </a>
                        </div>
                    </div>
                   <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                   <div class="table-responsive">
                      <table id="table_id" class="table table-bordered table-striped table-hover">
                         <thead>
                            <tr class="info">
                                <th>ID</th>
                               <th>Sản phẩm</th>
                               <th>Mã loại</th>
                               <th>Code</th>
                               <th>Ảnh</th>
                               <th>Giá</th>
                               <th>Giá giảm</th>
                               <th>Trạng thái</th>
                               <th>Featured</th>
                               <th>Hot</th>
                               <th>New</th>
                               <th>Hành động</th>
                            </tr>
                         </thead>
                         <tbody>
                             @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category_id }}</td>
                                    <td>{{ $product->code }}</td>
                                    <td>
                                        @if (!empty($product->image))
                                            <img src="uploads/products/{{ $product->image }}" alt="" style="width:100px">
                                        @endif
                                    </td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->discounted_price }}</td>
                                    <td>
                                        <button onclick="updateStatus({{$product->id}})" type="button" class="buttonupdate" id="{{$product->id}}-status"
                                            >

                                            @if ($product->status == "1")
                                                Hiện
                                            @else
                                                Ẩn
                                            @endif
                                        </button>
                                    </td>


                                    <td>
                                        <button onclick="updateFeature({{$product->id}})" type="button" class="buttonupdate" id="{{$product->id}}-feature"
                                            >

                                            @if ($product->feature == "1")
                                                Hiện
                                            @else
                                                Ẩn
                                            @endif
                                        </button>
                                    </td>
                                    <td>
                                        <button onclick="updateHot({{$product->id}})" type="button" class="buttonupdate" id="{{$product->id}}-hot"
                                            >

                                            @if ($product->hot == "1")
                                                Hiện
                                            @else
                                                Ẩn
                                            @endif
                                        </button>
                                    </td>
                                    <td>
                                        <button onclick="updateNew({{$product->id}})" type="button" class="buttonupdate" id="{{$product->id}}-new"
                                            >

                                            @if ($product->new == "1")
                                                Hiện
                                            @else
                                                Ẩn
                                            @endif
                                        </button>
                                    </td>
                                    <td>

                                        <a href="{{url('/admin/add-attributes/'.$product->id) }}" title="Thêm thuộc tính"  class="btn btn-warning btn-sm"><i class="fa fa-list"></i></a>
                                        <a href="{{url('/admin/edit-product/'.$product->id) }}" title="cập nhật sản phẩm"  class="btn btn-add btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a href="{{url('/admin/delete-product/'.$product->id) }}"  title="xóa sản phẩm" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> </a>
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

            function updateStatus(idPro)
            {
                // đường dẫn này để đến AjaxController
                $.get("admin/update-product-status/" + idPro,function (data) {
                    $("#"+idPro+"-status").text(data);
                });
            }
            function updateFeature(idPro)
            {
                // đường dẫn này để đến AjaxController
                $.get("admin/update-feature-product-status/" + idPro,function (data) {
                    $("#"+idPro+"-feature").text(data);
                });
            }
            function updateHot(idPro)
            {
                // đường dẫn này để đến AjaxController
                $.get("admin/update-hot-product-status/" + idPro,function (data) {
                    $("#"+idPro+"-hot").text(data);
                });
            }
            function updateNew(idPro)
            {
                // đường dẫn này để đến AjaxController
                $.get("admin/update-new-product-status/" + idPro,function (data) {
                    $("#"+idPro+"-new").text(data);
                });
            }


    </script>



@endsection
