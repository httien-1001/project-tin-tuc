@extends('layouts.master')

@section('content')
    <div class="container">

        <h2>Users</h2>
        @if(count((is_countable($data)?$data:[]))>0)
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>


            </tr>
            </thead>
            <tbody>
            @foreach($data as $result)
                <tr>

                    <td  style=" vertical-align: middle;">{{$result->id}}</td>
                    <td  style=" vertical-align: middle;">{{$result->name}}</td>
                    <td  style=" vertical-align: middle;">{{$result->email}}</td>
                    <td style=" vertical-align: middle;">
                        <a class="btn btn-xs btn-warning" href="{{route('admin.user.edit',['user'=> $result->id])}}">Edit</a>
                    </td>


                </tr>
            @endforeach
            </tbody>
        </table>
        {{$data->links()}}
        @else
            <h3>This page has no post</h3>
        @endif
    </div>
@endsection

