@extends('layouts.master')
@section('styles')
    <style>
    </style>
@endsection
@section('content')
    <div class="container">
        <h2>Posts</h2>
        @if(Auth::user()->can('admin.post.create'))
            <a class="btn btn-sm btn-danger my-2" href="{{route('admin.post.create')}}">Add new</a>
        @endif
        @if(count((is_countable($posts)?$posts:[]))>0)
            <table class="table table-striped table-responsive  table-responsive-md">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Code</th>
                    <th>Title</th>
                    <th >Author</th>
                    <th >Cover Image</th>
                    <th >Last updated at</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $count=1?>
                @foreach($posts as $result)
                    <tr >
                        <td style=" vertical-align: middle;">{{$count++}}</td>
                        <td style=" vertical-align: middle;">NWS.{{$result->id}}</td>
                        <td style=" vertical-align: middle;">{{$result->title}}</td>
                        <td style=" vertical-align: middle;">{{$result->getAuthor->name}}</td>
                        <td style=" vertical-align: middle;">
                            <img  src="../public/uploads/{{ $result->cover_image}}" style="width: 50px;">
                        </td>
                        <td style=" vertical-align: middle;">{{$result->updated_at}}</td>
                        <td style="display: flex">
                            @if(Auth::user()->can('admin.comment.index'))
                            <button type="button" class="btn btn-xs btn-primary mr-2" data-toggle="modal" data-target="#myModal{{$result->id}}"><i class="far fa-comment-alt"></i></button>
<!--                            modal comment for each post-->
                            @endif
                                <div class="modal" id="myModal{{$result->id}}">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content ">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h3 class="modal-title">Comment of post "{{$result->title}}"</h3>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body text-center">
                                            @if(count((is_countable($result->getComments)?$result->getComments:[]))>0)
                                            <table  class="table table-striped table-responsive">
                                                <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>ID</th>
                                                    <th>Content</th>
                                                    <th >Commenter</th>
                                                    <th >Created at</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $key=1 ?>
                                                @foreach($result->getComments as $cmt)
                                                    <tr>
                                                        <td>{{$key++}}</td>
                                                        <td>CMT.{{$cmt->id}}</td>
                                                        <td>{{$cmt->content}}</td>
                                                        <td>{{$cmt->getCommenter->name}}</td>
                                                        <td>{{$cmt->created_at}}</td>
                                                        <td>
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
                                            @else
                                            <span>This post has no comment</span>
                                            @endif
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
{{--                            end--}}
                            <a class="btn btn-xs btn-warning" href="{{route('admin.post.edit',['post'=> $result->id])}}"><i class="far fa-edit"></i></a>
                            <form action="{{route('admin.post.destroy',$result->id)}}" class="form"
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
                {!! $posts->links() !!}
            </div>
        @else
            <h3>You have no post </h3>
            @endif
            </h1>
    </div>
@endsection
