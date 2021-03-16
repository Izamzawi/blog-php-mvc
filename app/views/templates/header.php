<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
    <title><?= $data['page']; ?> - My Blog</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container justify-content-between">
        <a class="navbar-brand" href="<?= BASEURL; ?>">BLOG</a>
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="<?= BASEURL; ?>">Home<span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="<?= BASEURL; ?>/posts">Post</a>
            <a class="nav-item nav-link" href="<?= BASEURL; ?>/about">About me</a>
            <?php if(isset($_SESSION['user_id'])) : ?>
                <a class="nav-item nav-link" href="<?= BASEURL; ?>/users/signout">Log out</a>
            <?php else : ?>
                <a class="nav-item nav-link" href="<?= BASEURL; ?>/users/signin">Login</a>
            <?php endif; ?>
        </div>
    </div>
</nav>