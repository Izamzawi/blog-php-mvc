<?php 

include_once 'submit.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel baru</title>

    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
</head>
<body>
    <div class="container">
        <div class="editor">
            <h2>WYSIWYG Content Editor</h2>

            <form action="" method="post">
                <textarea name="editor" id="editor" cols="50" rows="10">
                    Ini textarea yang akan diubah oleh editor.
                </textarea>
                <input type="submit" value="submit" name="submit" >
            </form>
        </div>
    </div>

<!-- CKeditor to textarea -->
<script>
    CKEDITOR.replace( 'editor' );
</script>

</body>
</html>