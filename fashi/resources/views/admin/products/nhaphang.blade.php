@extends('admin.layouts.master')
@section('title','Products Import')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-product-hunt"></i>
        </div>
        <div class="header-title">
            <h1>Products Importing</h1>
            <small>Import Products</small>
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
            <div class="col-sm-8">
                <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                    <div class="btn-group" id="buttonlist">
                        <a class="btn btn-add " href="{{ url('/admin/import') }}">
                        <i class="fa fa-eye"></i>  Danh sách phiếu nhập </a>
                    </div>
                </div>
                <div class="panel-body">
                    <form class="col-sm-6" action="{{ url('/admin/nhaphang')}}" method="post" enctype="multipart/form-data"> {{csrf_field()}}
                        <div class="form-group">
                            <div class="field_wrapper_import">
                                <div style="display:flex; margin-bottom: 5px;">
                                    <select name="sanpham[]" onchange="getSize(0)"  style="width:200px; margin-right:5px" class="form-control" id="0">
                                        <option value="">Sản phẩm</option>
                                        @foreach ($products as $product)
                                            <option value="{{$product->id}}" >{{$product->name}}</option>
                                        @endforeach
                                    </select>
                                    <select style="width:200px; margin-right:5px" class="form-control" name="size[]" id="0-size">
                                            <option value="" >Size</option>
                                    </select>
                                    <input type="text" name="soluong[]" style="width:200px; margin-right:5px" id="soluong" placeholder="Số lượng" class="form-control" value=""/>
                                    <a href="javascript:void(0);" class="add_button_imp" title="Add field">Add</a>
                                </div>
                            </div>
                        </div>

                        <div class="reset-button">
                            <input type="submit" class="btn btn-success" value="Import Products">
                        </div>
                    </form>
                </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                </div>
                <div class="panel-body">
                    <form action="{{ url('/admin/import_file')}}" method="post" enctype="multipart/form-data"> {{csrf_field()}}
                        <div class="custom-file">
                            <input type="file" name="file" class="custom-file-input">
                        </div>
                          <div class="reset-button">
                            <input type="submit" class="btn btn-success" value="Import File">
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('script')
    <script>
        $(document).ready(function(){
                var maxFieldImp = 10; //Input fields increment limitation
                var addButtonImp = $('.add_button_imp'); //Add button selector
                var wrapperImp = $('.field_wrapper_import'); //Input field wrapper
                var fieldHTMLImp = '';
          //      var fieldHTMLImp = '<div style="display:flex; margin-bottom: 5px;"><select name="sanpham[]" style="width:200px; margin-right:5px" class="form-control" id="">@foreach ($products as $product)<option value="{{$product->id}}" >{{$product->name}}</option>@endforeach</select><select style="width:200px; margin-right:5px" class="form-control"  name="size[]" id=""><option value="size">M</option></select><input type="text" name="soluong[]" style="width:200px; margin-right:5px" id="soluong" placeholder="Số lượng" class="form-control" value=""/><a href="javascript:void(0);" class="remove_button_imp">Remove</a></div>'; //New input field html
                var y = 1; //Initial field counter is 1

                //Once add button is clicked
                $(addButtonImp).click(function(){
                    //Check maximum number of input fields
                    if(y < maxFieldImp){
                        fieldHTMLImp = '<div style="display:flex; margin-bottom: 5px;"><select onchange="getSize('+ y +')" name="sanpham[]" style="width:200px; margin-right:5px" class="form-control" id="' + y + '">@foreach ($products as $product)<option value="{{$product->id}}" >{{$product->name}}</option>@endforeach</select><select style="width:200px; margin-right:5px" class="form-control"  name="size[]" id="' + y + '-size"><option value="size">M</option></select><input type="text" name="soluong[]" style="width:200px; margin-right:5px" id="soluong" placeholder="Số lượng" class="form-control" value=""/><a href="javascript:void(0);" class="remove_button_imp">Remove</a></div>'; //New input field html
                        y++;
                        $(wrapperImp).append(fieldHTMLImp);
                    }
                });

                //Once remove button is clicked
                $(wrapperImp).on('click', '.remove_button_imp', function(e){
                    e.preventDefault();
                    $(this).parent('div').remove(); //Remove field html
                    y--; //Decrement field counter
                });
        });

        function getSize(id){
            var idPro = $('#'+id).val();
            var arr = [];
            $.get("admin/getSize/" + idPro,function (data) {
                data = JSON.parse(data);
                data.forEach(function(element){
                    arr.push(element['size']);
                });

                var text = '';
                for(var i = 0; i < arr.length; i++){
                    text += '<option value="'+ arr[i] +'">'+ arr[i] +'</option>';
                }

                $('#'+id + '-size').html(text);
            });
        }
    </script>
@endsection


