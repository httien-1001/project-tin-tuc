@extends('layouts.app')
@section('content')
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
                                    <a href="{{route('home')}}" class="nav-link ">
                                        <i class="icon-bar-chart"></i>
                                        <span class="title">Home</span>
                                    </a>
                                </li>
                                <li class="nav-item start ">
                                    <a href="{{route('customer.profile.index')}}" class="nav-link ">
                                        <i class="icon-bar-chart"></i>
                                        <span class="title">Profile</span>
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
                    <span class="active">Edit account</span>
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
                                <span class="caption-subject bold uppercase"> Change your password </span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form role="form"  method="POST" action="{{route('customer.profile.update',$user->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" class="form-control" name="user_id" value="{{$user->id}}">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label>Your current password</label>
                                        <div class="input-icon">
                                            <i class="fas fa-pencil-alt"></i>
                                            <input type="password" class="form-control" name="current_password" >
                                            @error('current_password')
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                {{$message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Your new password</label>
                                        <div class="input-icon">
                                            <i class="fas fa-pencil-alt"></i>
                                            <input type="password" class="form-control" name="new_password" >
                                            @error('new_password')
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                {{$message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm your new password</label>
                                        <div class="input-icon">
                                            <i class="fas fa-pencil-alt"></i>
                                            <input type="password" class="form-control" name="new_confirm_password" >
                                            @error('new_confirm_password')
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                {{$message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn blue" >Submit</button>
                                        <a href="{{route('home')}}">
                                            <button type="button" class="btn default" >Cancel</button>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END SAMPLE FORM PORTLET-->
                </div>
                <div class="col-md-6 ">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-red-sunglo">
                                <i class="icon-settings font-red-sunglo"></i>
                                <span class="caption-subject bold uppercase"> Change your profile picture </span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form role="form"  method="POST" action="{{route('customer.profile.store')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" class="form-control" name="user_id" value="{{$user->id}}">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label>Current profile picture</label>
                                        @isset($user->cover_image)
                                        <div class="input-icon">
                                            <img  src="../public/uploads/{{ $user->cover_image}}" style="width: 100px;">
                                        </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Edit profile picture</label>
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
                                    <div class="form-actions">
                                        <button type="submit" class="btn blue" >Submit</button>
                                        <a href="{{route('home')}}">
                                            <button type="button" class="btn default" >Cancel</button>
                                        </a>
                                    </div>
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
    </div>
@endsection
