@extends('layouts.master')

@section('content')
   <div class="container">
       <h2>Add new post </h2>
       <form role="form" method="POST" action="{{route('admin.post.store')}}" enctype="multipart/form-data">
           @csrf
           <input type="hidden" class="form-control" name="user_id" value="{{Auth::id()}}">
           <div class="form-group">
               <label for="name">Title:</label>
               <input type="text" class="form-control" id="name" name="post_title" value="{{old('post_title')}}">

           </div>
           <div class="form-group">
               <label for="name">Cover Image:</label>
               <input type="file" class="form-control" id="name" name="image" placeholder="Choose file" value="">

           </div>
           <div class="form-group">
               <label for="name">Content:</label>
<!--               <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">-->
               <textarea name="post_content" placeholder="Add content..." >{{old('post_content')}}</textarea>

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
