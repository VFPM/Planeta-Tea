tinymce.init({
    selector: '.content_page',
    plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist   pageembed permanentpen powerpaste table advtable  tinymcespellchecker wordcount',
    toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print |    template link anchor codesample | ltr rtl | table | wordcount',
    toolbar_mode: 'sliding',
    language: 'es_MX',
    height: 500,
    toolbar_sticky: true,
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    spellchecker_language: 'es_MX',
});