<div class="container">
    <?php if(isLoggedIn()): ?>
        <a class="btn green" href="<?= BASEURL; ?>/posts/create">
            Create
        </a>
    <?php endif; ?>

    <?php foreach($data['posts'] as $post) : ?>
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <!-- section for image, not yet written
                <div class="col-md-4">
                    <img src="..." class="card-img" alt="...">
                </div> -->
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="<?= BASEURL; ?>/posts/read/<?= $post['name']; ?>"><?= $post['title']; ?></a>
                        </h5>
                        <p class="card-text"><?= SUBSTR($post['content'], 0, 100); ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
