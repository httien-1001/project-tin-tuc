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
                    <span class="active">Edit role</span>
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
                                <span class="caption-subject bold uppercase"> Edit "{{$role->name}}" Role Form</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form role="form"  method="POST" action="{{route('admin.role.update',['role'=> $role->id])}}" >
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="form-group">
                                        <label>Role name</label>
                                        <div class="input-icon">
                                            <i class="fa font-green"></i>
                                            <input type="text" class="form-control" name="name" value="{{$role->name}}" >
                                            @error('name')
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                {{$message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Chọn permissions</label>
                                        @error('permissions')
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            {{$message }}
                                        </div>
                                        @enderror
                                        <div class="mt-checkbox-list">
                                            @foreach($permissions as $permission)
                                                <label class="mt-checkbox-outline"> {{$permission->full_name}}
                                                    <input  type="checkbox" value="{{$permission->id}}" name="permissions[]"
                                                    {{in_array($permission->id, $already_permissions) ? 'checked' : ""}}
                                                    />

                                                </label>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn blue" >Submit</button>
                                    <button type="button" class="btn default" href="{{route('admin.role.index')}}">Cancel</button>
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
