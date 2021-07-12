@extends('layouts.master')

@section('content')
   <div class="container">
       <h2>Add new post </h2>
       <form role="form" method="POST" action="{{route('admin.post.store')}}" enctype="multipart/form-data">
           @csrf
           <input type="hidden" class="form-control" name="user_id" value="{{Auth::id()}}">

           @if ($errors->any())
               <div class="alert alert-danger alert-dismissible" role="alert">
                   <ul>
                       @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                       @endforeach
                   </ul>
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                   </button>
               </div>
           @endif
           <div class="form-group">
               <label for="post_title">Title:</label>
               <input type="text" class="form-control" id="post_title" name="post_title" value="{{old('post_title')}}">

           </div>
           <div class="form-group">
               <label for="profile_image">Cover Image:</label>
               <input type="file" class="form-control"  style="border: none" id="profile_image" name="profile_image" placeholder="Choose file" value="">

           </div>
           <div class="form-group">
               <label for="">Content:</label>
<!--               <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">-->
               <textarea name="post_content" placeholder="Add content..." id="editor">{{old('post_content')}}</textarea>

           </div>
           <button type="submit" class="btn btn-success">Submit</button>
           <a clas="btn btn-outline-danger"href="{{route('admin.post.index')}}">Cancel</a>
       </form>
   </div>

@endsection
