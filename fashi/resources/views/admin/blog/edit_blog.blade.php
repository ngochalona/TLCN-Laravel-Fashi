@extends('admin.layouts.master')
@section('title','Edit Blog')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-comment"></i>
        </div>
        <div class="header-title">
            <h1>Edit Blog</h1>
            <small>Edit Blog</small>
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
                        <a class="btn btn-add " href="{{ url('/admin/view_blogs') }}">
                        <i class="fa fa-eye"></i>  View Blogs </a>
                    </div>
                </div>
                <div class="panel-body">
                    <form class="col-sm-6" action="{{ url('/admin/edit_blog/'.$blogDetails->id)}}" method="post" enctype="multipart/form-data"> {{csrf_field()}}

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" value="{{$blogDetails->title}}" name="blog_title" id="blog_title" required>
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea class="form-control" name="blog_content" id="blog_content">
                                {{$blogDetails->content}}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Blog Image</label>
                            <input type="file" name="image">
                            @if (!empty($blogDetails->image))
                                <input type="hidden" name="current_image" value="{{$blogDetails->image}}">
                                <img src="uploads/blogs/{{$blogDetails->image}}" style="width: 300px; height:200px">
                            @endif
                        </div>
                        <div class="reset-button">
                            <input type="submit" class="btn btn-success" value="Update Blog">
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection



