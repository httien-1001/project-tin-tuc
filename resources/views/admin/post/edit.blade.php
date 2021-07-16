@extends('layouts.admin')
@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEAD-->
            <div class="page-head">
                <!-- BEGIN PAGE TOOLBAR -->
                <div class="page-toolbar">

                </div>
                <!-- END PAGE TOOLBAR -->
            </div>
            <!-- END PAGE HEAD-->
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="{{route('home')}}">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">Form add post</span>
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE BASE CONTENT -->
            <div class="row">
                <div class="col-md-6 ">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-red-sunglo">
                                <i class="icon-settings font-red-sunglo"></i>
                                <span class="caption-subject bold uppercase"> Create New Post Form</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form role="form"  method="POST" action="{{route('admin.post.update',$post->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" class="form-control" name="user_id" value="{{Auth::id()}}">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <div class="input-icon">
                                            <i class="fas fa-pencil-alt"></i>
                                            <input type="text" class="form-control" name="post_title" value="{{$post->title}}">
                                            @error('post_title')
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                {{$message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Cover Image:</label>
                                            <img  src="../../../public/uploads/{{ $post->cover_image}}" style="width: 200px;" >
                                        </div>
                                        <div class="form-group">
                                            <label>Image</label>
                                            <div class="input-icon">
                                                <i class="fas fa-pencil-alt"></i>
                                                <input type="file" class="form-control" name="profile_image" >
                                                @error('profile_image')
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    {{$message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <div class="input-icon">
                                                <i class="fas fa-pencil-alt"></i>
                                                <textarea type="text" id="ckeditor1" class="ckeditor" name="post_description" >
                                                    {!! $post->description !!}
                                                </textarea>
                                                @error('post_description')
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    {{$message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Content</label>
                                            <div class="input-icon">
                                                <i class="fas fa-pencil-alt"></i>
                                                <textarea type="text" id="ckeditor2" class="ckeditor" name="post_content" >
                                                    {!! $post->post_content !!}
                                                </textarea>
                                                @error('post_content')
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    {{$message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="">Category</label>
                                            <select class="form-control" name="category_id">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}" {{($category->id == $post->category->id) ? 'selected' : ''}}> {{$category->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                {{$message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="">Status</label>
                                            <select class="form-control" name="status">
                                                <option value="1" >Show</option>
                                                <option value="0"> Hide </option>
                                            </select>
                                            @error('status')
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                {{$message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn blue" >Submit</button>
                                    <a href="{{route('admin.post.index')}}">
                                        <button type="button" class="btn default" >Cancel</button>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END SAMPLE FORM PORTLET-->
                </div>
            </div>
            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
@endsection
@section('js')
    <script>
        CKEDITOR.replace('ckeditor1');
        CKEDITOR.replace('ckeditor2');
    </script>
@endsection
