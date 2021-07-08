@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
            <h2>Users table</h2>
            @if(count((is_countable($data)?$data:[]))>0)
            <table class="table table-striped table-responsive">
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
                            <p>
                                    {{$role->name}}
                            </p>
                            @endforeach
                        </td>
                        <td style=" vertical-align: middle;">
                            <a class="btn btn-xs btn-warning " href="{{route('admin.user.edit',['user'=> $result->id])}}">Edit</a>
                            <form action="{{route('admin.user.destroy',$result->id)}}" class="form" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit"class="btn btn-xs btn-danger my-1">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
                <h3>This page has no users.</h3>
            @endif
            </div>
            <div class="col-md-4">
                <h2>Permissions </h2>
                <table class="table table-striped table-responsive">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $result)
                        <tr>
                            <td  style=" vertical-align: middle;">{{$result->id}}</td>
                            <td  style=" vertical-align: middle;">{{$result->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

