@extends('admin.layouts.master')
@section('title','Show Imports')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="header-icon">
          <i class="fa fa-product-hunt"></i>
       </div>
       <div class="header-title">
          <h1>Phiếu nhập hàng </h1>
          <small>Danh sách phiếu hàng</small>
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
                         <a class="btn btn-add" href="{{ url('/admin/nhaphang') }}"> <i class="fa fa-plus"></i> Nhập hàng
                         </a>
                      </div>
                   </div>
                   <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                   <div class="table-responsive">
                      <table id="table_id" class="table table-bordered table-striped table-hover">
                         <thead>
                            <tr class="info">
                                <th>ID</th>
                               <th>Số lượng</th>
                               <th>Ngày nhập</th>
                               <th>Hành động</th>
                            </tr>
                         </thead>
                         <tbody>
                             @foreach ($import as $phieu)
                                <tr>
                                    <td>{{ $phieu->id }}</td>
                                    <td>{{ $phieu->total_qty }}</td>
                                    <td>{{ $phieu->created_at }}</td>
                                    <td>
                                        <a href="{{url('/admin/nhaphang/'.$phieu->id) }}" title="Chi tiết phiếu nhập"  class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a>
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
