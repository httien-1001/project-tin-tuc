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
                    <a href="{{route('admin.post.index')}}">Post</a>
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
                                <span class="caption-subject font-red sbold uppercase">Posts Table</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="btn-group">
                                            <a href="{{route('admin.post.create')}}">
                                            <button id="sample_editable_1_new" class="btn green">
                                                Add New <i class="fa fa-plus"></i>
                                            </button>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                <thead>
                                <?php $key=1 ?>
                                <tr>
                                    <th> STT </th>
                                    <th> Category </th>
                                    <th> Title </th>
                                    <th> Cover Image </th>
                                    <th> Status </th>
                                    <th> Write by </th>
                                    <th> Created At </th>
                                    <th> Edit </th>
                                    <th> Delete </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td> {{$key++}} </td>
                                        <td> {{$post->category->name}} </td>
                                        <td> {{$post->title}} </td>
                                        <td>
                                            <img  src="../public/uploads/{{ $post->cover_image}}" style="width: 50px;">
                                        </td>
                                        <td> {{($post->status==1) ? 'Show' : 'Hide'}} </td>
                                        <td>{{$post->author->name}}</td>
                                        <td>{{$post->updated_at}}</td>
                                        <td>
                                            <a class="btn btn-xs btn-warning" href="{{route('admin.post.edit',['post'=> $post->id])}}">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{route('admin.post.destroy',$post->id)}}" class="form"
                                                  method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                        class="btn btn-xs btn-danger ml-2">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div  class="d-flex justify-content-center">
                                {!! $posts->links() !!}
                            </div>
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

