@extends('layouts.master-2')
@section('styles')
    <style>
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row mb-2">
            @foreach($data as $d)
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <h4 class="mb-0" >
                                <b>
                                    {{$d->title}}
                                </b>
                            </h4>
                            <div class="mb-1 text-muted mb-4">{{$d->updated_at}}</div>
                            <div class="card-text mb-auto text-content" ></div>
                            <a class="btn-outline-default" data-toggle="modal" href='#modal-id{{$d->id}}'>Read more</a>
                            <div class="modal fade " id="modal-id{{$d->id}}">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">{{$d->title}}</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="text-center mb-2">
                                            </div>
                                            {!! $d->content !!}
                                            <hr>
                                            <div class="comment">
                                                @if(count($d->getComments) <= 0)
                                                    <span>This post has no comment</span>
                                                    <hr>
                                                @else
                                                    <?php $key=1 ?>
                                                    @foreach($d->getComments as $cmt)
                                                        <div class="media-body">
                                                            <div class="well well-lg">
                                                                <div class="actionBox">
                                                                    <div class="d-block" >
                                                                        <span >{{$cmt->content}}</span>
                                                                        <br>
                                                                        <span  style="font-size: 12px">on {{$cmt->created_at}} by {{$cmt->getCommenter->name}}
                                                                        <span>
                                                                        @if(Auth::id()==$cmt->getCommenter->id)
                                                                                <form action="{{route('customer.comment.destroy',['comment'=>$cmt->id])}}" class="form" method="post">
                                                                                @csrf
                                                                                    @method('delete')
                                                                                <button type="submit"class="btn btn-default">
                                                                                    <span style="font-size: 12px">Delete comment</span>
                                                                                </button>
                                                                            </form>
                                                                            @endif
                                                                        </span>
                                                                            </span>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    <hr>
                                                @endif
                                            </div>
                                            @guest
                                                <span>Please login to leave your comment</span>
                                                <a href="{{route('login')}}">Login</a>
                                            @else
                                                @if(Auth::user()->can('customer.comment.create'))
                                                    <form action="{{route('customer.comment.store')}}" method="POST" role="form">
                                                        @csrf
                                                        <input type="hidden" value="{{$d->id}}" name="post_id">
                                                        <input type="hidden" class="form-control" name="user_id" value="{{Auth::id()}}">
                                                        <div class="form-group">
                                                            <label for="">Add comment</label>
                                                            <input type="text" class="form-control" id="" name="comment_content">
                                                        </div>
                                                        <button type="submit" class="btn btn-xs btn-outline-secondary">Send</button>
                                                    </form>
                                                @else
                                                    <span>You cannot create comment</span>
                                                @endif
                                            @endguest
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img class="card-img-right flex-auto d-none d-md-block" style="width: 200px; height: 250px; object-fit: cover"  src="public/uploads/{{ $d->cover_image}}" >
                    </div>
                </div>
            @endforeach

        </div>
        <div  class="d-flex justify-content-center">
            {!! $data->links() !!}
        </div>
    </div>
@endsection
@section('js')
@endsection
