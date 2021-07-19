@extends('layouts.app')
@section('content')
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        @guest
        <!-- BEGIN SIDEBAR -->
            @else
        <div class="page-sidebar-wrapper">
            <div class="page-sidebar navbar-collapse collapse">
                <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                    <li class="nav-item start ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-home"></i>
                            <span class="title">Dashboard</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item start ">
                                <a href="{{route('customer.profile.index')}}" class="nav-link ">
                                    <i class="icon-bar-chart"></i>
                                    <span class="title">Profile</span>
                                </a>
                            </li>
                            <li class="nav-item start ">
                                <a href="{{route('customer.profile.show',Auth::id())}}" class="nav-link ">
                                    <i class="icon-bar-chart"></i>
                                    <span class="title">Comment</span>
                                </a>
                            </li>
                        
                        </ul>
                    </li>
                </ul>
                <!-- END SIDEBAR MENU -->
            </div>
            <!-- END SIDEBAR -->
        </div>
        <!-- END SIDEBAR -->
        @endguest
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">

                <!-- END PAGE BREADCRUMB -->
                <!-- BEGIN PAGE BASE CONTENT -->
                <div class="blog-page blog-content-1">

                            <div class="row">
                                @foreach($posts as $post)
                                <div class="col-sm-6">
                                    <a href="{{route('home.show',$post->id)}}">
                                    <div class="blog-post-sm bordered blog-container">
                                        <div class="blog-img-thumb">
                                            <a href="{{route('home.show',$post->id)}}">
                                                <img  src="public/uploads/{{ $post->cover_image}}" style="object-fit: contain; min-height: 300px" >
                                            </a>
                                        </div>
                                        <div class="blog-post-content">
                                            <h2 class="blog-title blog-post-title">
                                                <a href="{{route('home.show',$post->id)}}">{{$post->title}}</a>
                                            </h2>
                                            <p class="blog-post-desc">{!!$post->description!!}</p>
                                            <div class="blog-post-foot">
                                                <div class="blog-post-meta">
                                                    <i class="icon-calendar font-blue"></i>
                                                    @isset($post->updated_at)
                                                    {{ $post->updated_at->format('d/m/Y') }}
                                                    @endisset
                                                </div>
                                                <div class="blog-post-meta">
                                                    <i class="icon-bubble font-blue"></i>
                                                    <a href="javascript:">{{count($post->comments)}}</a>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                @endforeach
                            </div>


                </div>
                <!-- END PAGE BASE CONTENT -->
            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
        <!-- BEGIN QUICK SIDEBAR -->
        <a href="javascript:;" class="page-quick-sidebar-toggler">
            <i class="icon-login"></i>
        </a>
        <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
@endsection
@section('js')
@endsection