@extends('admin.layouts.master')
@section('title','View Categories')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="header-icon">
          <i class="fa fa-eye"></i>
       </div>
       <div class="header-title">
          <h1>Khôi phục loại sản phẩm</h1>
          <small>Danh sách loại sản phẩm</small>
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
                         <h4>Loại sản phẩm</h4>
                      </a>
                   </div>
                </div>
                <div class="panel-body">
                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                   <div class="btn-group">
                      <div class="buttonexport" id="buttonlist">
                         <a class="btn btn-add" href="{{ url('/admin/add-category') }}"> <i class="fa fa-plus"></i> Thêm loại sản phẩm
                         </a>
                      </div>

                   </div>
                   <div class="btn-group">
                    <div class="buttonexport" id="buttonlist">
                       <a class="btn btn-add" href="{{ url('/admin/view-categories') }}" title="Xem loại sản phẩm"> <i class="fa fa-trash-restore"></i> Xem loại sản phẩm
                       </a>
                    </div>

                 </div>
                   <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                   <div class="table-responsive">
                      <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                         <thead>
                            <tr class="info">
                                <th>ID</th>
                               <th>Loại sản phẩm</th>
                               <th>Parent ID</th>
                               <th>Url</th>
                               <th>Trạng thái</th>

                            </tr>
                         </thead>
                         <tbody>
                             @foreach ($categories as $category)
                                <tr class="{{$category->id}}">
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->parent_id }}</td>
                                    <td>{{ $category->url }}</td>
                                    <td>


                                        <button onclick="restore({{$category->id}})" type="button" class="buttonupdate" id="{{$category->id}}"
                                            >

                                            @if ($category->isDelete == "1")
                                                Khôi phục
                                            @endif
                                        </button>

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

            function restore(idCategory)
            {
                // đường dẫn này để đến AjaxController
                $.get("admin/restore-category-status/" + idCategory,function (data) {
                   // alert(data);
                   //var obj = document.getElementById(idCategory).text;
                  // alert(obj);
                    $("."+idCategory).remove();
                    // data ở bên AjaxController
                });
            }


    </script>



@endsection
