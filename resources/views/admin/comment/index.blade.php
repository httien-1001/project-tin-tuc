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
                    <a href="{{route('admin.comment.index')}}">Comment</a>
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
                                <span class="caption-subject font-red sbold uppercase">Comments Table</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-6">

                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-responsive">
                                <thead>
                                <tr >
                                    <th>STT</th>
                                    <th>Post title</th>
                                    <th >Comment content</th>
                                    <th >By user</th>
                                    <th >Created at</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $key=1 ?>
                                @foreach($comments as $cmt)
                                    <tr >
                                        <td style=" vertical-align: middle;">{{$key++}}</td>
                                        <td style=" vertical-align: middle;">{{$cmt->getPost->title}}</td>
                                        <td style=" vertical-align: middle;">{{$cmt->content}}</td>
                                        <td style=" vertical-align: middle;">{{$cmt->getCommenter->name}}</td>
                                        <td style=" vertical-align: middle;">{{$cmt->created_at}}</td>
                                        <td style=" vertical-align: middle;">
                                            {{($cmt->deleted_at != null ? 'Hide ' : 'Show ')}}
                                        </td>
                                        <td style=" vertical-align: middle; display: flex">
                                            @if($cmt->deleted_at != null)
                                                <a href="{{route('admin.comment.edit',$cmt->id)}}">
                                                    <button class="btn btn-primary btn-xs-ml-2">
                                                        <i class="fas fa-trash-restore-alt"></i></button>
                                                </a>
                                            @else
                                                <a href="{{route('admin.comment.show',$cmt->id)}}">
                                                    <button class="btn btn-primary btn-xs-ml-2">
                                                        <i class="fa fa-ban" aria-hidden="true"></i>
                                                    </button>
                                                </a>
                                            @endif
                                            <form action="{{route('admin.comment.destroy',$cmt->id)}}" class="form"
                                                  method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                        class="btn btn-xs btn-danger ml-2">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div  class="d-flex justify-content-center">
                                {!! $comments->links() !!}
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


