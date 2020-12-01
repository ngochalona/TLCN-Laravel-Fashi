@extends('admin.layouts.master')
@section('title','Products Attributes')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-product-hunt"></i>
        </div>
        <div class="header-title">
            <h1>Products Attributes</h1>
            <small>Add Products Attributes</small>
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
            <!-- Form controls -->
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                    <div class="btn-group" id="buttonlist">
                        <a class="btn btn-add " href="{{ url('/admin/view-products') }}">
                        <i class="fa fa-eye"></i>  View Products </a>
                    </div>
                </div>
                <div class="panel-body">
                                                                                    {{-- //id của product --}}
                    <form class="col-sm-6" action="{{ url('/admin/add-attributes/'. $productDetails->id)}}" method="post" enctype="multipart/form-data"> {{csrf_field()}}

                        <div class="form-group">
                            <label>Product Name</label> {{ $productDetails->name}}

                        </div>
                        <div class="form-group">
                            <label>Product Code</label> {{ $productDetails->code}}

                        </div>

                        <div class="form-group">
                            <div class="field_wrapper">
                                <div style="display:flex; margin-bottom: 5px;">
                                    <input type="text" name="sku[]" style="width:200px; margin-right:5px" id="sku" placeholder="SKU: {{$productDetails->code}}-S" class="form-control" value=""/>
                                    <input type="text" name="size[]" style="width:200px; margin-right:5px" id="size" placeholder="SIZE" class="form-control" value=""/>
                                    <input type="text" name="stock[]" style="width:200px; margin-right:5px" id="stock" placeholder="STOCK" class="form-control" value=""/>
                                    <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                                </div>
                            </div>
                        </div>

                        <div class="reset-button">
                            <input type="submit" class="btn btn-success" value="Add Atributes">
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

        {{-- view attributes --}}
        <section class="content">
            <div class="row">
               <div class="col-sm-12">
                  <div class="panel panel-bd lobidrag">
                     <div class="panel-heading">
                        <div class="btn-group" id="buttonexport">
                           <a href="#">
                              <h4>View Attributes</h4>
                           </a>
                        </div>
                     </div>
                     <div class="panel-body">
                     <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                        <div class="btn-group">
                           <div class="buttonexport" id="buttonlist">
                              <a class="btn btn-add" href="{{ url('/admin/add-product') }}"> <i class="fa fa-plus"></i> Add Product
                              </a>
                           </div>

                        </div>
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                        <div class="table-responsive">
                           <table id="dataTableExample1" class="table table-bordered table-striped table-hover">

                            <form method="post" enctype="multipart/form-data" action="{{ url('/admin/edit-attributes/'.$productDetails->id) }}">
                            {{csrf_field()}}
                                <thead>
                                 <tr class="info">
                                     <th>Attribute ID</th>
                                    <th>SKU</th>
                                    <th>Size</th>
                                    <th>Stock</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                  @foreach ($productDetails->attributes as $attribute)
                                     <tr>
                                         {{-- mảng attr[] chứa tất cả attribute_id --}}
                                         <td style="display:none"><input type="hidden" name="attr[]" value="{{ $attribute->id }}">{{ $attribute->id }}</td>
                                         <td>{{ $attribute->id }}</td>
                                         <td><input type="text" name="sku[]" value="{{ $attribute->sku }}" style="text-align:center"></td>
                                         <td><input type="text" name="size[]" value="{{ $attribute->size }}" style="text-align:center"></td>
                                         <td><input type="text" name="stock[]" value="{{ $attribute->stock }}" style="text-align:center"></td>

                                         <td class="center">
                                             <div class="btn-group">
                                                <input style="height:30px; padding-top:4px" type="submit" value="Update" class="btn btn-success">
                                                <a href="{{url('/admin/delete-attributes/'.$attribute->id) }}" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> </a>
                                             </div>

                                         </td>
                                     </tr>
                                  @endforeach


                              </tbody>
                           </table>
                        </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

         </section>
    </div>
    <!-- /.content-wrapper -->
@endsection


