@extends('admin.layouts.master')
@section('title','View Orders')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="header-icon">
          <i class="fa fa-eye"></i>
       </div>
       <div class="header-title">
          <h1>View Orders</h1>
          <small>Orders</small>
       </div>
    </section>


    <!-- Main content -->
    <section class="content">
       <div class="row">
          <div class="col-sm-12">
             <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                   <div class="btn-group" id="buttonexport">
                      <a href="#">
                         <h4>View Orders</h4>
                      </a>
                   </div>
                </div>
                <div class="panel-body">
                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->

                   <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                   <div class="table-responsive">
                      <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                         <thead>
                            <tr class="info">
                                <th>Order ID</th>
                               <th>Order Date</th>
                               <th>Customer Name</th>
                               <th>Customer Email</th>
                               <th>Ordered Product</th>
                               <th>Order Amount</th>
                               <th>Order Status</th>
                               <th>Payment Method</th>
                               <th>Actions</th>

                            </tr>
                         </thead>
                         <tbody>
                             {{-- @foreach ($coupons as $coupon)
                                <tr>
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
                                        <button onclick="update({{$coupon->id}})" type="button" class="buttonupdate" id="{{$coupon->id}}"
                                            >

                                            @if ($coupon->status == "1")
                                                Active
                                            @else
                                                Unactive
                                            @endif
                                        </button>
                                    </td>
                                    <td>
                                        <a href="{{ url('/admin/edit-coupon/'.$coupon->id)}}" class="btn btn-add btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ url('/admin/delete-coupon/'.$coupon->id)}}" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> </a>
                                    </td>
                                </tr>
                             @endforeach --}}

                                @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td> {{ $order->created_at}} </td>
                                    <td> {{ $order->name}} </td>
                                    <td> {{ $order->user_email}} </td>

                                    <td>
                                        @foreach ($order->orders as $pro)
                                            {{ $pro->product_code }}
                                            ({{ $pro->product_qty }})
                                            <br>
                                        @endforeach
                                    </td>
                                    <td>{{ $order->grand_total }}</td>
                                    <td>{{ $order->order_status }}</td>
                                    <td>{{ $order->payment_method }}</td>
                                    <td class="center">
                                        <a href="{{url('/admin/orders/'.$order->id)}}" target="_blank" class="btn btn-primary btn-sm">Xem chi tiết</a> <br><br>

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

            function update(idBanner)
            {
                $.get("admin/update-coupon-status/" + idBanner,function (data) {
                    $("#"+idBanner).text(data);
                });
            }
    </script>



@endsection
