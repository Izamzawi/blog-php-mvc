<div class="container">
    <h2 class="mx-3">Semua Post</h2>
    <?php if(isLoggedIn()): ?>
        <a class="d-block mx-3 my-3" href="<?= BASEURL; ?>/Posts/addnew">
            <button type="button" class="btn btn-primary">Write New Post</button>
        </a>
    <?php endif; ?>

    <?php foreach($data['posts'] as $post) : ?>
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="<?= BASEURL; ?>/Posts/read/<?= $post['name']; ?>"><?= $post['title']; ?></a>
                    </h5>
                    <p class="card-text"><?= SUBSTR($post['content'], 0, 100); ?>...</p>
                    <?php if(isLoggedIn()): ?>
                    <a href="<?= BASEURL; ?>/Posts/edit/<?= $post['id']; ?>" class="mr-2">
                        <button type="button" class="btn btn-warning">Edit</button>
                    </a>
                    <a href="<?= BASEURL; ?>/Posts/delete/<?= $post['id']; ?>">
                        <button type="button" class="btn btn-danger">Delete</button>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>