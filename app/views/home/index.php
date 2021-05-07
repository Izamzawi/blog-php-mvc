<div class="container">
    <div class="jumbotron mt-3">
        <h1 class="display-4">Selamat datang di blog saya.</h1>
        <p class="lead">Mari berkenalan melalui tulisan.</p>
        <hr class="my-4">
        <p>Selamat membaca.</p>
    </div>

    <div class="container-lg">

        <!-- This PHP tag will loop through post database and the $i variable will limit the shown posts to 5 -->
        <?php $i=1; ?>
        <?php foreach($data['posts'] as $post ) : if($i >= 5) break; ?>
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
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
        <?php $i++; ?>
        <?php endforeach; ?>

    </div>

</div>