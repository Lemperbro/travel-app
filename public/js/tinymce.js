tinymce.init({
    selector: 'textarea#isi',
    content_css : ['./css/list.css'],
    forced_root_block: 'ul',
    forced_root_block_attrs: { 'class': 'circle' },

    image_class_list: [
    {title: 'img-responsive', value: 'img-responsive'},
    ],
    height: 500,
    setup: function (editor) {
        editor.on('init change', function () {
            editor.save();
        });
    },
    plugins: 
        "advlist autolink lists link image charmap print preview anchor  searchreplace visualblocks code fullscreen insertdatetime media table contextmenu paste imagetools fullscreen"
    ,
    toolbar: "insertfile undo redo | image styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link fullscreen",

    image_title: true,
    automatic_uploads: true,
    images_upload_url: '/upload_image_tiny',
    file_picker_types: 'image',
    file_picker_callback: function(cb, value, meta) {
        var input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');
        input.onchange = function() {
            var file = this.files[0];

            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function () {
                var id = 'blobid' + (new Date()).getTime();
                var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                var base64 = reader.result.split(',')[1];
                var blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);
                cb(blobInfo.blobUri(), { title: file.name });
            };
        };
        input.click();
    }
});


