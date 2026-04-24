// CDN TinyMCE para editor enriquecido
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    tinymce.init({
        selector: '#main_description, #main_description_2',
        menubar: false,
        plugins: 'lists link image table code',
        toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image table | code',
        height: 220
    });
});
</script>
<?php /**PATH C:\workspace\ists\resources\views\admin\crud\menu_items\designs\partials\tinymce.blade.php ENDPATH**/ ?>