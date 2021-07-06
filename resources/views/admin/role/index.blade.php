@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Roles</h2>
    <a class="btn btn-sm btn-danger my-2" href="{{route('admin.role.create')}}">Add new</a>
    <table class="table table-striped table-responsive">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th >Permissions</th>


        </tr>
        </thead>
        <tbody>
        @foreach($data as $result)
            <tr>

                <td  style=" vertical-align: middle;">{{$result->id}}</td>
                <td  style=" vertical-align: middle;">{{$result->name}}</td>
                <td style=" vertical-align: middle; " width="200px">{{$result->permissions}}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
    {{$data->links()}}
</div>
@endsection

