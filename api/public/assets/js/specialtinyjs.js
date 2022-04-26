tinymce.init({
    selector: '.content_page',
    plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist mediaembed pageembed permanentpen powerpaste table advtable  tinymcespellchecker image code media link wordcount',
    toolbar: 'insertfile undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print |    template link anchor codesample | ltr rtl | table | image code | wordcount',
    height: 600,
    image_title: true,
    automatic_uploads: true,
    relative_urls: false,
    remove_script_host: false,
    images_upload_url: "/sistema/upload-images",
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
    },
    toolbar_mode: 'sliding',
    language: 'es_MX',
    height: 700,
    toolbar_sticky: true,
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    spellchecker_language: 'es_MX',
});