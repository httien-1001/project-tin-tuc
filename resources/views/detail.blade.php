@extends('layouts.app')
@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-container">
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEAD-->
            <div class="page-head">
                <!-- BEGIN PAGE TOOLBAR -->
                <!-- END PAGE TOOLBAR -->
            </div>
            <!-- END PAGE HEAD-->
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="{{route('home')}}">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE BASE CONTENT -->
            <div class="blog-page blog-content-2">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="blog-single-content bordered blog-container">
                            <div class="blog-single-head">
                                <h1 class="blog-single-head-title">{{$detail->title}}</h1>
                                <div class="blog-single-head-date">
                                    <i class="icon-calendar font-blue"></i>
                                    @isset($detail->updated_at)
                                    {{ $detail->updated_at->format('d/m/Y') }}
                                    @endisset
                                </div>
                            </div>
                            <div class="blog-single-img">
                                <img  src="../public/uploads/{{ $detail->cover_image}}" >
                            <div class="blog-single-desc">
                                <p>
                                {!! $detail->content !!}
                                </p>
                            </div>
                            <div class="blog-comments">
                                <h3 class="sbold blog-comments-title">{{count($detail->comments)}}  Comments</h3>
                                @foreach($detail->comments as $cmt)
                                <div class="c-comment-list">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="media-object" alt="" src=""> </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">
                                                <a >{{$cmt->commenter->name}}</a> on <span class="c-date">{{$cmt->created_at->format('d/m/Y')}}</span>
                                            </h4>
                                            {{$cmt->content}}
                                            <span class="pull-right">@if(Auth::id()==$cmt->commenter->id)
                                                    <form action="{{route('customer.comment.destroy',['comment'=>$cmt->id])}}" class="form" method="post">
                                                                                @csrf
                                                        @method('delete')
                                                                                <button type="submit"class="btn btn-default">
                                                                                    <span style="font-size: 12px">Delete</span>
                                                                                </button>
                                                                            </form>
                                                @endif
                                            </span>

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @guest
                                    <span>Please <a href="{{route('login')}}">login</a> to leave your comment</span>

                                @else
                                <h3 class="sbold blog-comments-title">Leave A Comment</h3>
                                    <form action="{{route('customer.comment.store')}}" method="POST" role="form">
                                        @csrf
                                        <input type="hidden" value="{{$detail->id}}" name="post_id">
                                        <input type="hidden" class="form-control" name="user_id" value="{{Auth::id()}}">
                                        <div class="form-group">
                                            <input type="text" name="comment" value="{{Auth::user()->name}}" class="form-control c-square">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" value="{{Auth::user()->email}}" class="form-control c-square">
                                        </div>
                                        <div class="form-group">
                                            <textarea rows="8" name="message" placeholder="Write comment here ..." class="form-control c-square">
                                            </textarea>
                                        </div>
                                        @error('message')
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            {{$message }}
                                        </div>
                                        @enderror
                                        <div class="form-group">
                                            <button type="submit" class="btn blue uppercase btn-md sbold btn-block">Submit</button>
                                        </div>
                                    </form>
                                @endguest
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="blog-single-sidebar bordered blog-container">
                            <div class="blog-single-sidebar-recent">
                                <h3 class="blog-sidebar-title uppercase">Posts in same category</h3>

                                    @foreach($posts_in_same_category as $post)
                                    <ul>
                                        <li>
                                            <a href="route('')}}:;">{{$post->title}}</a>
                                        </li>
                                    </ul>
                                    @endforeach

                            </div>
                            <div class="blog-single-sidebar-tags">
                                <h3 class="blog-sidebar-title uppercase">Category</h3>
                                <ul class="blog-post-tags">
                                    <li class="uppercase">
                                        <a href="">{{$detail->category->name}}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    </div>
@endsection
@section('js')
@endsection
