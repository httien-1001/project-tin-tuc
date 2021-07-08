@extends('layouts.master')

@section('content')
    <div class="container">
        <h2>Edit post No.{{$data->id}}</h2>
        <form role="form" method="POST" action="{{route('admin.post.update',$data->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" class="form-control" name="user_id" value="{{Auth::id()}}">
            <div class="form-group">
                <label for="name">Title:</label>
                <input type="text" class="form-control" id="name" name="post_title" value="{{$data->title}}">
                @error('post_title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Cover Image:</label>
                <img  src="../../../public/uploads/{{ $data->cover_image}}" style="width: 200px;">
                <input type="file" class="form-control" id="name" name="cover_image" placeholder="Choose file">
            </div>
            <div class="form-group">
                <label for="name">Content:</label>
                <textarea name="post_content" >{{$data->content}}</textarea>
                @error('post_content')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
            <a clas="btn btn-outline-danger"href="{{route('admin.post.index')}}">Cancel</a>
        </form>
    </div>

@endsection
@section('js')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>
@endsection

