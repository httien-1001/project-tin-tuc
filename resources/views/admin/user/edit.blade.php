@extends('layouts.master')

@section('content')

<div class="container">
    <h2>Edit for user {{$data->name}}</h2>
    <form role="form" method="POST" action="{{route('admin.user.update',['user' => $data->id])}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{$data->name}}">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" value="{{$data->email}}">
        </div>

        <div class="form-group">
            @foreach($role as $r)
            <input type="checkbox" {{in_array($r->name,$already_role) ? 'checked' : ''}}  name="role[]" value="{{$r->id}}"> {{$r->name}}
            @endforeach
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <a class="btn btn-outline-info" href="{{route('admin.user.index')}}" >Cancel</a>
    </form>
</div>
 @endsection
