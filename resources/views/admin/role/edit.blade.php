@extends('layouts.master')
@section('content')
    <div class="container">
        <h2>Edit form No.{{id}}</h2>
        <form role="form" method="POST" action="{{route('admin.role.update',$id)}}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
            </div>
            <div  class="form-group" >

                @foreach($routes as $r)
                    <div style="display: flex">
                        <input type="checkbox" class="form-check-input" name="route[]" value="{{$r}}">
                        <label class="form-check-label" >{{$r}}</label>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
            <a class="btn btn-outline-info" href="{{route('admin.role.index')}}" >Cancel</a>
        </form>
    </div>

@endsection

