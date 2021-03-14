<?php 

include_once 'submit.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tes WYSIWYG</title>

    <link rel="stylesheet" href="style.css">
    <script src="<?= APPURL; ?>/assets/ckeditor/ckeditor.js"></script>
</head>
<body>
    <div class="container">
        <div class="editor">
            <h2>WYSIWYG Content Editor</h2>

            <?php if( !empty( $statusMsg )) { ?>
            <p class="statmsg"><?= $statusMsg ?></p>
            <?php } ?>

            <form action="" method="post">
                <textarea name="editor" id="editor" cols="50" rows="10">
                    Ini textarea yang akan diubah oleh editor.
                </textarea>
                <input type="submit" value="submit" name="submit" >
            </form>
        </div>

        <?php if( !empty( $editorContent )){ ?>
        <div class="ins-cont">
            <h4>Content</h4>
            <?= $editorContent; ?>
        </div>
        <?php } ?>

    </div>

<!-- CKeditor to textarea -->
<script>
    CKEDITOR.replace( 'editor' );
</script>

</body>
</html>