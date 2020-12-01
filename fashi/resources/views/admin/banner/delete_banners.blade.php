@extends('admin.layouts.master')
@section('title','Banners')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="header-icon">
          <i class="fa fa-eye"></i>
       </div>
       <div class="header-title">
          <h1>Khôi phục Banners</h1>
          <small>Banners</small>
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
                         <h4>Banners</h4>
                      </a>
                   </div>
                </div>
                <div class="panel-body">
                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                   <div class="btn-group">
                      <div class="buttonexport" id="buttonlist">
                         <a class="btn btn-add" href="{{ url('/admin/add-banner') }}"> <i class="fa fa-plus"></i> Thêm Banner
                         </a>
                      </div>

                   </div>
                   <div class="btn-group">
                    <div class="buttonexport" id="buttonlist">
                       <a class="btn btn-add" href="{{ url('/admin/banners') }}"> <i class="fa fa-plus"></i> Xem Banners
                       </a>
                    </div>

                 </div>
                   <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                   <div class="table-responsive">
                      <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                         <thead>
                            <tr class="info">
                                <th>ID</th>
                               <th>Tên</th>
                               <th>Nội dung</th>
                               <th>Ảnh</th>
                               <th>Trạng thái</th>

                            </tr>
                         </thead>
                         <tbody>
                             @foreach ($banners as $banner)
                                <tr class="{{$banner->id}}">
                                    <td>{{ $banner->id }}</td>
                                    <td>{{ $banner->name }}</td>
                                    <td>{{ $banner->content }}</td>
                                    <td>
                                        @if (!empty($banner->image))
                                            <img src="uploads/banners/{{$banner->image}}" style="width: 400px; height:200px">
                                        @endif

                                    </td>
                                    <td>
                                        <button onclick="restore({{$banner->id}})" type="button" class="buttonupdate" id="{{$banner->id}}"
                                            >

                                            @if ($banner->status == "1")
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

            function restore(idBanner)
            {
                $.get("admin/restore-banner-status/" + idBanner,function (data) {
                    $("."+ idBanner).remove();
                });
            }


    </script>



@endsection
