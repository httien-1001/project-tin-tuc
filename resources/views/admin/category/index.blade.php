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
                    <a href="{{route('admin.category.index')}}">Category</a>
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
                                <span class="caption-subject font-red sbold uppercase">Categories Table</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="btn-group">
                                            <a href="{{route('admin.category.create')}}">
                                                <button id="sample_editable_1_new" class="btn green"> Add New
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </a>
                                        </div>
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
                                <tr>
                                    <th> STT </th>
                                    <th> Category Name </th>
                                    <th> Last Updated At </th>
                                    <th> Edit </th>
                                    <th> Delete </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $key=1; ?>
                                @foreach($categories as $category)
                                    <tr class="category_{{$category->id}}">
                                        <td> {{$key++}} </td>
                                        <td> {{$category->name}} </td>
                                        <td> {{$category->updated_at}} </td>
                                        <td>
                                            <a class="btn btn-sm btn-warning" href="{{route('admin.category.edit',$category->id)}}"> Edit </a>
                                        </td>
                                        <td>
                                            <form action="{{route('admin.category.destroy',$category->id)}}" class="form" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                        class="btn btn-sm btn-danger ml-2">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
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

    <script>
    </script>
@endsection


