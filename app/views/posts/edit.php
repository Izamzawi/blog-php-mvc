<script src="<?= APPURL; ?>/assets/ckeditor/ckeditor.js"></script>
<div class="container mx-auto" style="width: 625px;">

    <div class="editor">
        <h2 class="text-center my-3">Edit your post here</h2>

        <form class="mx-auto" action="" method="post" style="width: 600px;">
            <div class="input-group mb-2">
                <input type="text" name="title" id="title" class="form-control" value="<?= $data['post']['title']; ?>" aria-label="Post title" aria-describedby="basic-addon1">
            </div>
            <textarea name="content" id="content" cols="75" rows="40" placeholder="You can write your post here.">
                <?= $data['post']['content']; ?>
            </textarea>
            <button type="submit" class="btn btn-primary mt-2" style="font-size: 16px;">Submit post</button>
        </form>
        <p class="my-3 text-danger"> 
            <span class="invalidFeedback">
                <?= $data['titleError']; ?>
                <?= $data['contentError']; ?>
            </span>
         </p>
    </div>

</div>

<!-- CKeditor to textarea -->
<script>
    CKEDITOR.replace( 'content' );
</script>

</body>
</html>