<div class="container">
    <div class="jumbotron mt-3">
        <h1 class="display-4">Selamat datang di blog saya.</h1>
        <p class="lead">Mari berkenalan melalui tulisan.</p>
        <hr class="my-4">
        <p>Selamat membaca.</p>
        <!-- <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a> -->
    </div>

    <div class="container-lg">

        <?php foreach($data['posts'] as $post ) : ?>
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <!-- section for image, not yet written
                <div class="col-md-4">
                    <img src="..." class="card-img" alt="...">
                </div> -->
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $post['title']; ?></h5>
                        <p class="card-text"><?= SUBSTR($post['content'], 0, 100); ?></p>
                        <p class="card-text"><small class="text-muted">
                        <a href="<?= BASEURL; ?>/posts/read/<?= $post['name']; ?>">Selengkapnya...</a>
                        </small></p>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

    </div>

</div>