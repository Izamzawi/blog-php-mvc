<div class="container">

    <form class="mx-auto" action="" method="post" style="width: 400px;">
        <h2 class="text-center my-3">Sign-in here</h2>
        <div class="input-group">
            <input type="text" name="username" id="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <input type="password" name="password" id="password" class="form-control" placeholder="Write your password" aria-label="Password" aria-describedby="basic-addon2">
        </div>
        <button type="submit" name="signin" id="signin" class="btn btn-primary" style="width: 400px; font-size: 20px">Signin</button>

        <p class="mt-3">Not registered yet? <a href="<?= BASEURL; ?>/users/register">Create an account.</a></p>
    </form>


    
</div>
