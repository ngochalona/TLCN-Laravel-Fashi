@extends('admin.layouts.master')
@section('title','coupons')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="header-icon">
          <i class="fa fa-eye"></i>
       </div>
       <div class="header-title">
          <h1>Khôi phục mã giảm giá</h1>
          <small>Coupons</small>
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
                         <h4>Coupons</h4>
                      </a>
                   </div>
                </div>
                <div class="panel-body">
                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                   <div class="btn-group">
                      <div class="buttonexport" id="buttonlist">
                         <a class="btn btn-add" href="{{ url('/admin/add-coupon') }}"> <i class="fa fa-plus"></i> Thêm Coupon
                         </a>
                      </div>

                   </div>
                   <div class="btn-group">
                    <div class="buttonexport" id="buttonlist">
                       <a class="btn btn-add" href="{{ url('/admin/view-coupons') }}"> <i class="fa fa-plus"></i> Xem Coupons
                       </a>
                    </div>

                 </div>
                   <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                   <div class="table-responsive">
                      <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                         <thead>
                            <tr class="info">
                                <th>ID</th>
                               <th>code</th>
                               <th>Giảm số lượng</th>
                               <th>Loại</th>
                               <th>Ngày hết hạn</th>
                               <th>Ngày tạo</th>
                               <th>Trạng thái</th>

                            </tr>
                         </thead>
                         <tbody>
                             @foreach ($coupons as $coupon)
                                <tr class="{{$coupon->id}}">
                                    <td>{{ $coupon->id }}</td>
                                    <td>{{ $coupon->coupon_code }}</td>
                                    <td>
                                        {{ $coupon->amount }}
                                        @if ($coupon->amount_type == "Percentage") % @else $ @endif
                                    </td>
                                    <td>{{ $coupon->amount_type }}</td>
                                    <td>{{ $coupon->expiry_date }}</td>
                                    <td>{{ $coupon->created_at }}</td>
                                    <td>
                                        <button onclick="restore({{$coupon->id}})" type="button" class="buttonupdate" id="{{$coupon->id}}"
                                            >

                                            @if ($coupon->status == "1")
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

            function restore(idCoupon)
            {
                $.get("admin/restore-coupon-status/" + idCoupon,function (data) {
                    $("."+idCoupon).remove();
                });
            }
    </script>



@endsection
