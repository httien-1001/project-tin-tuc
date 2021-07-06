@extends('layouts.master')

@section('content')
    <div class="container">
        <h2>Posts</h2>
        <a class="btn btn-sm btn-danger my-2" href="{{route('admin.post.create')}}">Add new</a>
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
                    <td style=" vertical-align: middle;">
                        <a class="btn btn-xs btn-warning" href="{{route('admin.post.edit',['post'=> $result->id])}}">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
            {{$data->links()}}
        @else
            <h3>This page has no post</h3>
        @endif
        </h1>
    </div>
@endsection
