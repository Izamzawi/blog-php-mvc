<div class="container">

        <form class="mx-auto" action="" method="post" style="width: 550px;">
            <h2 class="text-center my-3">Register here</h2>

            <label for="username">Choose a username</label>
            <div class="input-group mb-1">
                <input type="text" placeholder="Username here" name="username" class="form-control" id="username" aria-label="Username">
                <span class="d-block invalidFeedback">
                    <?= $data['usernameError']; ?>
                </span>        
            </div>

            <label for="email">Enter a valid email</label>
            <div class="input-group mb-1">
                <input type="email" placeholder="Email here" name="email" class="form-control" id="email" aria-label="Email">
                <span class="d-block invalidFeedback">
                    <?= $data['emailError']; ?>
                </span>
            </div>

            <label for="password">Type your password</label>
            <div class="input-group mb-1">
                <input type="password" placeholder="Must contain at least 8 characters and 1 number" name="password" class="form-control" id="password" aria-label="password">
                <span class="d-block invalidFeedback">
                    <?= $data['passwordError']; ?>
                </span>
            </div>

            <label for="confirmPassword">Re-type password</label>
            <div class="input-group mb-1">
                <input type="password" placeholder="Password confirmation" name="confirmPassword" class="form-control" id="confirmPassword" aria-label="password">
                <span class="d-block invalidFeedback">
                    <?= $data['confirmPasswordError']; ?>
                </span>
            </div>

            <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary mt-2" style="width: 550px; font-size: 20px">Submit</button>

            <p class="mt-3">Already registered? <a href="<?= BASEURL; ?>/admins/sigNin">Sign-in here.</a></p>
        </form>
    </div>
</div>
