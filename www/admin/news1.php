<?php
require_once 'blocks' . DIRECTORY_SEPARATOR .'header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR  . 'bootstrap.php';
?>

    <!-- Include stylesheet -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<style>
    .container{
        color: black;
        background: white;
    }
</style>

<div class="container">
    <!-- Create the editor container -->
    <div id="editor">
        <p>Hello World!</p>
        <p>Some initial <strong>bold</strong> text</p>
        <p><br></p>
    </div>
</div>
    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    ['bold', 'italic'],
                    ['link', 'blockquote', 'code-block', 'image'],
                    [{ list: 'ordered' }, { list: 'bullet' }]
                ]
            },
        });
    </script>

<?php require_once 'blocks/footer.php';
