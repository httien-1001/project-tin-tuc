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
                <div class="page-toolbar">
                    <!-- BEGIN THEME PANEL -->
                    <div class="btn-group btn-theme-panel">
                        <a href="javascript:;" class="btn dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-settings"></i>
                        </a>
                    </div>
                    <!-- END THEME PANEL -->
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
                                    <a href="">{{ $detail->created_at->format('d/m/Y') }}</a>
                                </div>
                            </div>
                            <div class="blog-single-img">
                                <img  src="../public/uploads/{{ $detail->cover_image}}" style="object-fit: contain; min-height: 300px" >
                            <div class="blog-single-desc">
                                <p>
                                {{$detail->content}}
                                </p>
                            </div>
                            <div class="blog-comments">
                                <h3 class="sbold blog-comments-title">{{count($detail->comments)}}  Comments</h3>
                                <div class="c-comment-list">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="media-object" alt="" src="../assets/pages/img/avatars/team1.jpg"> </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">
                                                <a href="#">Sean</a> on
                                                <span class="c-date">23 May 2015, 10:40AM</span>
                                            </h4> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. </div>
                                    </div>
                                </div>
                                <h3 class="sbold blog-comments-title">Leave A Comment</h3>
                                <form action="">
                                    <div class="form-group">
                                        <input type="text" placeholder="Your Name" class="form-control c-square"> </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Your Email" class="form-control c-square"> </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Your Website" class="form-control c-square"> </div>
                                    <div class="form-group">
                                        <textarea rows="8" name="message" placeholder="Write comment here ..." class="form-control c-square"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn blue uppercase btn-md sbold btn-block">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="blog-single-sidebar bordered blog-container">
                            <div class="blog-single-sidebar-recent">
                                <h3 class="blog-sidebar-title uppercase">Recent Posts</h3>
                                <ul>
                                    <li>
                                        <a href="javascript:;">Metronic Admin Progress</a>
                                    </li>
                                </ul>
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
