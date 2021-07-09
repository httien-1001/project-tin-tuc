@extends('layouts.master')
@section('styles')
@endsection
@section('content')
    <div class="container">
        <h2>Comments</h2>
        @if(count((is_countable($posts)?$posts:[]))>0)
            <table class="table table-striped table-responsive">
                <thead>
                <tr >
                    <th>ID</th>
                    <th>Post title</th>
                    <th >Comment content</th>
                    <th >By user</th>
                    <th >Created at</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $cmt)
                    <tr >
                        <td style=" vertical-align: middle;">{{$cmt->id}}</td>
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
        @else
        <h3>This page has no comment</h3>
        @endif
    </div>

@endsection
