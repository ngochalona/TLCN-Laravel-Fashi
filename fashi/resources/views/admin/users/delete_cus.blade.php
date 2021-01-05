@extends('admin.layouts.master')
@section('title','Customer')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-user"></i>
            </div>
            <div class="header-title">
                <h1>Khôi phục khách hàng</h1>
                <small>Khách hàng</small>
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
                                    <h4>Khách hàng</h4>
                                </a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="btn-group">
                                <div class="buttonexport" id="buttonlist">
                                    <a class="btn btn-add" href="{{ url('/admin/customers') }}"> <i class="fa fa-eye"></i> Xem khách hàng
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
                                        <th>Email</th>
                                        <th>Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($customers as $cus)
                                        <tr class="{{$cus->id}}">
                                            <td>{{ $cus->id }}</td>
                                            <td>{{ $cus->name }}</td>
                                            <td>{{ $cus->email }}</td>
                                            <td>
                                                <button onclick="restore({{$cus->id}})" type="button" class="buttonupdate" id="{{$cus->id}}"
                                                >
                                                    @if ($cus->isDelete == "1")
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

        function restore(idCus)
        {
            $.get("admin/restore-cus-delete/" + idCus,function (data) {
                $("."+idCus).remove();
            });
        }


    </script>



@endsection
