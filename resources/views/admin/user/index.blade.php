@extends('layouts.master')

@section('content')
    <div class="container">
            <h2>Users table</h2>
{{--        modal permission--}}
                <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#exampleModal">
                    Permissions
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Already permissions</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                <table class="table table-striped table-responsive">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Created At</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $count=1 ?>
                                    @foreach($roles as $result)
                                        <tr>
                                            <td  style=" vertical-align: middle;">{{$count++}}</td>
                                            <td  style=" vertical-align: middle;">{{$result->name}}</td>
                                            <td  style=" vertical-align: middle;">{{$result->created_at}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
{{--        end modal permission    --}}
{{--        table user--}}
        @if(count((is_countable($data)?$data:[]))>0)
            <table class="table table-striped table-">
                <thead>
                <tr>
                    <th  style=" vertical-align: middle;">ID</th>
                    <th  style=" vertical-align: middle;">Name</th>
                    <th  style=" vertical-align: middle;">Email</th>
                    <th  style=" vertical-align: middle;">Created at</th>
                    <th  style=" vertical-align: middle;">Last updated at</th>
                    <th  style=" vertical-align: middle;">Permissions</th>
                    <th  style=" vertical-align: middle;">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $key=1 ?>
                @foreach($data as $result)
                    <tr>
                        <td  style=" vertical-align: middle;">{{$key++}}</td>
                        <td  style=" vertical-align: middle;">{{$result->name}}</td>
                        <td  style=" vertical-align: middle;">{{$result->email}}</td>
                        <td  style=" vertical-align: middle;">{{$result->created_at}}</td>
                        <td  style=" vertical-align: middle;">{{$result->updated_at}}</td>
                        <td  style=" vertical-align: middle;">
                            @foreach($result->getRoles as $role)
                            <p>
                                    {{$role->name}}
                            </p>
                            @endforeach
                        </td>
                        <td style=" display: flex ">
                            <a  href="{{route('admin.user.edit',$result->id)}}">
                               <button class="btn btn-xs btn-warning mr-2 my-auto">
                                 <i class="far fa-edit"></i>
                               </button>
                            </a>
                            @if($result->id != 2)
                            <form action="{{route('admin.user.destroy',$result->id)}}" class="form" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit"class="btn btn-xs btn-danger mr-2">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
                <h3>This page has no users.</h3>
            @endif
{{--        end table user--}}
    </div>
@endsection

