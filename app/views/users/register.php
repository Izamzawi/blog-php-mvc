<div class="container">
    <div class="wrapper-login">
        <h2>Register</h2>

            <form id="register-form" method="POST" action="<?= APPURK; ?>/users/register"
                >
            <input type="text" placeholder="Username" name="username">
            <span class="invalidFeedback">
                <?= $data['usernameError']; ?>
            </span>

            <input type="email" placeholder="Enter a valid email" name="email">
            <span class="invalidFeedback">
                <?= $data['emailError']; ?>
            </span>

            <input type="password" placeholder="Password" name="password">
            <span class="invalidFeedback">
                <?= $data['passwordError']; ?>
            </span>

            <input type="password" placeholder="Re-type password" name="confirmPassword">
            <span class="invalidFeedback">
                <?= $data['confirmPasswordError']; ?>
            </span>

            <button id="submit" type="submit" value="submit">Submit</button>

            <p class="options">Not registered yet? <a href="<?= APPURK; ?>/users/register">Create an account!</a></p>
        </form>
    </div>
</div>
