@extends('layouts.master')

@section('content')
    <div class="container">
        <h2>Users</h2>
        @if(count((is_countable($data)?$data:[]))>0)
        <table class="table table-striped">
            <thead>
            <tr>
                <th  style=" vertical-align: middle;">ID</th>
                <th  style=" vertical-align: middle;">Name</th>
                <th  style=" vertical-align: middle;">Email</th>
                <th  style=" vertical-align: middle;">Permissions</th>
                <th  style=" vertical-align: middle;">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $result)
                <tr>
                    <td  style=" vertical-align: middle;">{{$result->id}}</td>
                    <td  style=" vertical-align: middle;">{{$result->name}}</td>
                    <td  style=" vertical-align: middle;">{{$result->email}}</td>
                    <td  style=" vertical-align: middle;">
                   @foreach($result->getRoles as $role)

                                {{$role->name}}

                        @endforeach
                    </td>
                    <td style=" display: flex">
                        <a class="btn btn-xs btn-warning" href="{{route('admin.user.edit',['user'=> $result->id])}}">Edit</a>
                        <form action="{{route('admin.user.destroy',$result->id)}}" class="form" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit"class="btn btn-xs btn-danger ml-2">
                                Delete
                            </button>
                        </form>
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

