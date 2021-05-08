<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <title><?= $data['page']; ?> - My Blog</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container justify-content-between">
        <a class="navbar-brand" href="<?= BASEURL; ?>">BLOG</a>
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="<?= BASEURL; ?>">Home<span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="<?= BASEURL; ?>/Posts">Post</a>
            <a class="nav-item nav-link" href="<?= BASEURL; ?>/About">About me</a>
            <?php if(isset($_SESSION['admin_id'])) : ?>
                <a class="nav-item nav-link" href="<?= BASEURL; ?>/Admins/signout">Sign out</a>
            <?php else : ?>
                <a class="nav-item nav-link" href="<?= BASEURL; ?>/Admins/signin">Sign in</a>
            <?php endif; ?>
        </div>
    </div>
</nav>