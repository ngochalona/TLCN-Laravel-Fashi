@extends('admin.layouts.master')
@section('title','Blogs')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="header-icon">
          <i class="fa fa-comment"></i>
       </div>
       <div class="header-title">
          <h1>Khôi phục blogs</h1>
          <small>Blogs</small>
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
                         <h4>Blog</h4>
                      </a>
                   </div>
                </div>
                <div class="panel-body">
                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                   <div class="btn-group">
                      <div class="buttonexport" id="buttonlist">
                         <a class="btn btn-add" href="{{ url('/admin/add_blog') }}"> <i class="fa fa-plus"></i> Thêm Blog
                         </a>
                      </div>

                   </div>
                   <div class="btn-group">
                    <div class="buttonexport" id="buttonlist">
                       <a class="btn btn-add" href="{{ url('/admin/view_blogs') }}"> <i class="fa fa-plus"></i> Xem Blogs
                       </a>
                    </div>

                 </div>
                   <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                   <div class="table-responsive">
                      <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                         <thead>
                            <tr class="info">
                                <th>ID</th>
                               <th>Tiêu đề</th>
                               <th>Nội dung</th>
                               <th>Ảnh</th>
                               <th>Trạng thái</th>

                            </tr>
                         </thead>
                         <tbody>
                             @foreach ($blogs as $blog)
                                <tr class="{{$blog->id}}">
                                    <td>{{ $blog->id }}</td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->content }}</td>
                                    <td>
                                        @if (!empty($blog->image))
                                            <img src="uploads/blogs/{{$blog->image}}" style="width: 300px; height:200px">
                                        @endif

                                    </td>
                                    <td>
                                        <button onclick="restore({{$blog->id}})" type="button" class="buttonupdate" id="{{$blog->id}}"
                                            >

                                            @if ($blog->status == "1")
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

            function restore(idBlog)
            {
                $.get("admin/restore-blog-status/" + idBlog,function (data) {
                    $("."+idBlog).remove();
                });
            }


    </script>



@endsection
