var characterNumber = $("#title").text().length;
console.log(name);
if (characterNumber > 100) {
    var shortName =  $("#title").text().substring(0, 100) + " ...";
    var newTitle=shortName.bold();
    $("#title").replaceWith(newTitle);

}
var characterNumber = $("#content").text().length;
console.log(name);
if(window.matchMedia("(max-width: 700px)")){
    if (characterNumber > 120) {
        var shortName =  $("#content").text().substring(0, 120) + " ...";
        $("#content").replaceWith(shortName);
    }
} else {
    if (characterNumber > 200) {
        var shortName =  $("#content").text().substring(0, 200) + " ...";
        $("#content").replaceWith(shortName);
    }
}
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
    height: 500
});
