@extends('layouts.master')
@section('styles')
@endsection
@section('content')
    <div class="container">
        <h2>Comments</h2>
        @if(count((is_countable($comments)?$comments:[]))>0)
            <table class="table table-striped table-responsive">
                <thead>
                <tr >
                    <th>STT</th>
                    <th>Post title</th>
                    <th >Comment content</th>
                    <th >By user</th>
                    <th >Created at</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $key=1 ?>
                @foreach($comments as $cmt)
                    <tr >
                        <td style=" vertical-align: middle;">{{$key++}}</td>
                        <td style=" vertical-align: middle;">{{$cmt->getPost->title}}</td>
                        <td style=" vertical-align: middle;">{{$cmt->content}}</td>
                        <td style=" vertical-align: middle;">{{$cmt->getCommenter->name}}</td>
                        <td style=" vertical-align: middle;">{{$cmt->created_at}}</td>
                        <td style=" vertical-align: middle;">
                            {{($cmt->deleted_at != null ? 'Hide ' : 'Show ')}}
                        </td>
                        <td style=" vertical-align: middle; display: flex">
                            @if($cmt->deleted_at != null)
                                <a href="{{route('admin.comment.edit',$cmt->id)}}">
                                    <button class="btn btn-primary btn-xs-ml-2">
                                    <i class="fas fa-trash-restore-alt"></i></button>
                                </a>
                            @else
                                <a href="{{route('admin.comment.show',$cmt->id)}}">
                                    <button class="btn btn-primary btn-xs-ml-2">
                                        <i class="fa fa-ban" aria-hidden="true"></i>
                                    </button>
                                </a>
                                @endif
                                <form action="{{route('admin.comment.destroy',$cmt->id)}}" class="form"
                                      method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                            class="btn btn-xs btn-danger ml-2">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div  class="d-flex justify-content-center">
                {!! $comments->links() !!}
            </div>
        @else
        <h3>This page has no comment</h3>
        @endif
    </div>

@endsection
@section('js')
    <script>
        tinymce.init({
            selector: '#editor',
            plugins: 'image code',
            toolbar: 'undo redo | link image | code',
            /* enable title field in the Image dialog*/
            image_title: true,
            /* enable automatic uploads of images represented by blob or data URIs*/
            automatic_uploads: true,
            /*
              URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
              images_upload_url: 'postAcceptor.php',
              here we add custom filepicker only to Image dialog
            */
            file_picker_types: 'image',
            /* and here's our custom image picker*/
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                /*
                  Note: In modern browsers input[type="file"] is functional without
                  even adding it to the DOM, but that might not be the case in some older
                  or quirky browsers like IE, so you might want to add it to the DOM
                  just in case, and visually hide it. And do not forget do remove it
                  once you do not need it anymore.
                */

                input.onchange = function () {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.onload = function () {
                        /*
                          Note: Now we need to register the blob in TinyMCEs image blob
                          registry. In the next release this part hopefully won't be
                          necessary, as we are looking to handle it internally.
                        */
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        /* call the callback and populate the Title field with the file name */
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                    reader.readAsDataURL(file);
                };

                input.click();
            },
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
            height: 500,
            menubar: true
        });

    </script>
@endsection
