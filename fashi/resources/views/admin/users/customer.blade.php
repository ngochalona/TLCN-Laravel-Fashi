@extends('admin.layouts.master')
@section('title','Customers')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="header-icon">
          <i class="fa fa-eye"></i>
       </div>
       <div class="header-title">
          <h1>Customers</h1>
          <small>Customers</small>
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
                         <h4>View Customers</h4>
                      </a>
                   </div>
                </div>
                   <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                   <div class="table-responsive">
                      <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                         <thead>
                            <tr class="info">
                                <th>ID</th>
                               <th>Name</th>
                               <th>Email</th>
                               <th>Status</th>
                               <th>Action</th>

                            </tr>
                         </thead>
                         <tbody>
                             @foreach ($userDetails as $customer)
                                <tr>
                                    <td>{{ $customer->id }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>
                                        <button onclick="update({{$customer->id}})" type="button" class="buttonupdate" id="{{$customer->id}}"
                                            >

                                            @if ($customer->status == "1")
                                                Active
                                            @else
                                                Unactive
                                            @endif
                                        </button>
                                    </td>

                                    <td>
                                        <a href="#" class="btn btn-add btn-sm" data-toggle="modal" data-target="#myModal{{ $customer->id}}" title="view more"><i class="fa fa-eye"></i></a>
                                        <a href="{{ url('/admin/delete-customer/'.$customer->id)}}" type="button" title="delete customer" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa khách hàng này?');"><i class="fa fa-trash-o"></i> </a>
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

 @foreach ($userDetails as $customer)
 <div class="modal fade in" id="myModal{{$customer->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
          <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
             <h1 class="modal-title">{{$customer->name}}</h1>
          </div>
          <div class="modal-body">
            <div class="table-responsive">
                <table id="dataTableExample1" class="table table-bordered table-striped table-hover">

                   <tbody>
                       <tr>
                           <td class="taskDesc">Tên khách hàng</td>
                           <td class="taskStatus">{{$customer->name}}</td>
                       </tr>
                       <tr>
                        <td class="taskDesc">Email</td>
                        <td class="taskStatus">{{$customer->name}}</td>
                    </tr>
                    <tr>
                        <td class="taskDesc">Địa chỉ</td>
                        <td class="taskStatus">{{$customer->address}}, {{$customer->ward}}, {{$customer->state}}, {{$customer->city}}</td>
                    </tr>
                    <tr>
                        <td class="taskDesc">Số điện thoại</td>
                        <td class="taskStatus">{{$customer->mobile}}</td>
                    </tr>
                    <tr>
                        <td class="taskDesc">Trạng thái kích hoạt</td>
                        <td class="taskStatus">
                            @if($customer->status == 0)
                                Chưa kích hoạt tài khoản
                            @else
                                Đã kích hoạt tài khoản
                            @endif
                        </td>
                    </tr>
                   </tbody>
                </table>
             </div>
          </div>
          <div class="modal-footer">
             <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

          </div>
       </div>
    </div>
 </div>
@endforeach
@endsection

@section('script')
    <script>

        function update(idCustomer)
        {
            $.get("admin/update-customer-status/" + idCustomer,function (data) {
                $("#"+idCustomer).text(data);
            });
        }


    </script>



@endsection
