@extends('admin.layouts.master')
@section('title','Import Details')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="header-icon">
          <i class="fa fa-product-hunt"></i>
       </div>
       <div class="header-title">
          <h1>Chi tiết phiếu nhập</h1>
          <small>Phiếu hàng {{$id}}</small>
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
                         <h4>Chi tiết phiếu nhập hàng</h4>
                      </a>
                   </div>
                </div>
                <div class="panel-body">
                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                   <div class="btn-group">
                      <div class="buttonexport" id="buttonlist">
                         <a class="btn btn-add" href="{{ url('/admin/nhaphang') }}"> <i class="fa fa-plus"></i> Nhập hàng
                         </a>
                      </div>
                   </div>
                   <div class="btn-group">
                    <div class="buttonexport" id="buttonlist">
                       <a class="btn btn-add" href="{{ url('/admin/import') }}"> <i class="fa fa-eye"></i> Xem danh sách
                       </a>
                    </div>
                 </div>
                   <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                   <div class="table-responsive">
                      <table id="table_id" class="table table-bordered table-striped table-hover">
                         <thead>
                            <tr class="info">
                               <th>ID sản phẩm</th>
                               <th>Size</th>
                               <th>Số lượng</th>
                            </tr>
                         </thead>
                         <tbody>
                             @if (isset($details))
                                @foreach ($details as $detail)
                                <tr>
                                    <td>{{ $detail->product_id }}</td>
                                    <td>{{ $detail->size }}</td>
                                    <td>{{ $detail->quantity }}</td>
                                </tr>
                                @endforeach
                             @endif
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
