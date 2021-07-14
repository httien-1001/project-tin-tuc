@extends('layouts.admin')

@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="{{route('admin.index')}}">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{route('admin.permission.index')}}">Permission</a>
                    <i class="fa fa-circle"></i>
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE BASE CONTENT -->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light portlet-fit bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-settings font-red"></i>
                                <span class="caption-subject font-red sbold uppercase">Permissions Table</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-6">
<!--                                        <div class="btn-group">
                                            <a href="{{route('admin.permission.create')}}">
                                            <button id="sample_editable_1_new" class="btn green">
                                                Add New<i class="fa fa-plus"></i>
                                            </button>
                                            </a>
                                        </div>-->
                                    </div>
                                    <div class="col-md-6">
{{--                                        <div class="btn-group pull-right">--}}
{{--                                            <button class="btn green btn-outline dropdown-toggle" data-toggle="dropdown">Tools--}}
{{--                                                <i class="fa fa-angle-down"></i>--}}
{{--                                            </button>--}}
{{--                                            <ul class="dropdown-menu pull-right">--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;"> Print </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;"> Save as PDF </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;"> Export to Excel </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                <thead>
                                <?php $key=1 ?>
                                <tr>
                                    <th> STT </th>
                                    <th> Full Name </th>
                                    <th> Route </th>
                                    <th> Created At </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($permissions as $permission)
                                <tr>
                                    <td> {{$key++}} </td>
                                    <td> {{$permission->full_name}} </td>
                                    <td> {{$permission->route_name}} </td>
                                    <td> {{$permission->created_at}} </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
@endsection

