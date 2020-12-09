@extends('admin.layouts.master')
@section('title','Orders Details')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="header-icon">
          <i class="fa fa-eye"></i>
       </div>
       <div class="header-title">
          <h1>Orders {{$orderDetails->id}}</h1>
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
          <div class="col-sm-6">
             <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                   <div class="btn-group" id="buttonexport">
                      <a href="#">
                         <h4>Chi tiết đơn hàng</h4>
                      </a>
                   </div>
                </div>
                <div class="panel-body">
                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->

                   <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                   <div class="table-responsive">
                      <table id="dataTableExample1" class="table table-bordered table-striped table-hover">

                         <tbody>
                             <tr>
                                 <td class="taskDesc">Ngày đặt</td>
                                 <td class="taskStatus">{{$orderDetails->created_at->format('Y-m-d')}}</td>
                             </tr>
                             <tr>
                                <td class="taskDesc">Trạng thái</td>
                                <td class="taskStatus">{{$orderDetails->order_status}}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Tổng tiền</td>
                                <td class="taskStatus">{{$orderDetails->grand_total}}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Phí vận chuyển</td>
                                <td class="taskStatus">{{$orderDetails->shipping_charges}}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Mã giảm giá</td>
                                <td class="taskStatus">{{$orderDetails->coupon_code}}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Tiền giảm</td>
                                <td class="taskStatus">{{$orderDetails->coupon_amount}}</td>
                            </tr>
                            <tr>
                                <td class="taskDesc">Phương thức thanh toán</td>
                                <td class="taskStatus">{{$orderDetails->payment_method}}</td>
                            </tr>
                         </tbody>
                      </table>
                   </div>
                </div>
             </div>
          </div>

          <div class="col-sm-6">

              <div class="panel panel-bd lobidrag">
                  <div class="panel-heading">
                      <div class="btn-group" id="buttonexport">
                          <a href="#">
                              <h4>Thông tin khách hàng</h4>
                          </a>
                      </div>
                  </div>
                  <div class="panel-body">
                      <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->

                      <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                      <div class="table-responsive">
                          <table id="dataTableExample1" class="table table-bordered table-striped table-hover">

                              <tbody>
                              <tr>
                                  <td class="taskDesc">Họ và tên</td>
                                  <td class="taskStatus">{{$orderDetails->name}}</td>
                              </tr>
                              <tr>
                                  <td class="taskDesc">Địa chỉ</td>
                                  <td class="taskStatus">
                                      {{$orderDetails->address}},
                                      {{$orderDetails->ward}},
                                      {{$orderDetails->state}},
                                      {{$orderDetails->city}}
                                  </td>
                              </tr>
                              <tr>
                                  <td class="taskDesc">Số điện thoại</td>
                                  <td class="taskStatus">{{$orderDetails->mobile}}</td>
                              </tr>
                              <tr>
                                  <td class="taskDesc">Email</td>
                                  <td class="taskStatus">{{$orderDetails->user_email}}</td>
                              </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
            <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                   <div class="btn-group" id="buttonexport">
                      <a href="#">
                         <h4>Cập nhật trạng thái</h4>
                      </a>
                   </div>
                </div>
                <div class="panel-body">
                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->

                   <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                   <form action="{{url('/admin/update-order-status')}}" method="post">{{csrf_field()}}
                        <input type="hidden" name="order_id" id="" value="{{$orderDetails->id}}">
                       <input type="hidden" name="user_id" id="" value="{{$orderDetails->user_id}}">
                       <input type="hidden" name="user_email" id="" value="{{$orderDetails->user_email}}">
                        <table style="width: 100%">
                            <tr>
                                <td>
                                    <select name="order_status" id="order_status" class="form-control">
                                        <option value="Đang xử lý" @if ($orderDetails->order_status == "Đang xử lý") selected @endif>Đang xử lý</option>
                                        <option value="Đang giao" @if ($orderDetails->order_status == "Đang giao") selected @endif>Đang giao</option>
                                        <option value="Hủy đơn" @if ($orderDetails->order_status == "Hủy đơn") selected @endif>Hủy đơn</option>
                                        <option value="Đã thanh toán" @if ($orderDetails->order_status == "Đã thanh toán") selected @endif>Đã thanh toán</option>

                                    </select>
                                </td>
                                <td>
                                    <input type="submit" value="Update Status" class="btn btn-sm btn-success"
                                           onclick="return confirm('Bạn chắc chắn muốn thay đổi trạng thái đơn hàng?');">
                                </td>
                            </tr>
                        </table>


                    </form>
                </div>
             </div>



          </div>
        </div>

    </section>
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                       <div class="btn-group" id="buttonexport">
                          <a href="#">
                             <h4>Sản phẩm đã đặt</h4>
                          </a>
                       </div>
                    </div>
                    <div class="panel-body">
                    <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->

                       <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                       <div class="table-responsive">
                          <table id="dataTableExample1" class="table table-bordered table-striped table-hover">

                            <thead>
                                <th>Mã</th>
                                <th>Sản phẩm</th>
                                <th>Size</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                            </thead>
                             <tbody>
                                @foreach ($orderDetails->orders as $pro)
                                    <tr>
                                        <td>{{ $pro->product_code}}</td>
                                        <td>{{ $pro->product_name}}</td>
                                        <td>{{ $pro->product_size}}</td>
                                        <td>{{ $pro->product_price}}</td>
                                        <td>{{ $pro->product_qty}}</td>

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


