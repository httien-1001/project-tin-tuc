@extends('layouts.master')

@section('content')
    <div class="container">
        <h2>Posts</h2>
        @if(Auth::user()->can('admin.post.create'))
        <a class="btn btn-sm btn-danger my-2" href="{{route('admin.post.create')}}">Add new</a>

        @endif
        @if(count((is_countable($data)?$data:[]))>0)
            <table class="table table-striped " >
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th >Author</th>
                <th >Cover Image</th>
                <th >Last updated at</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $result)
                <tr >
                    <td style=" vertical-align: middle;">{{$result->id}}</td>
                    <td style=" vertical-align: middle;">{{$result->title}}</td>
                    <td style=" vertical-align: middle;">{{$result->getAuthor->name}}</td>
                    <td style=" vertical-align: middle;">
                        <img  src="../public/uploads/{{ $result->cover_image}}" style="width: 50px;">
                    </td>
                    <td style=" vertical-align: middle;">{{$result->updated_at}}</td>
                    <td style="display: flex">
                        <a class="btn btn-xs btn-warning" href="{{route('admin.post.edit',['post'=> $result->id])}}">Edit</a>
                        <form action="{{route('admin.post.destroy',$result->id)}}" class="form"
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
        <div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Modal body..
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
            {{$data->links()}}
        @else
            <h3>You have no post</h3>
        @endif
        </h1>
    </div>
@endsection
