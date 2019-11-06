<?php define('DISABLE_AUTH_FORM', false); ?>

<?php if (DISABLE_AUTH_FORM===false): ?>
    <form method="post" class="form-inline mx-3">
        <input type="text" class="form-control" placeholder="Login" name="login">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <button class="btn">ok</button>
    </form>

    <div>
        <a href="auth-page.php">
            Регистрация
        </a>
    </div>
<?php endif; ?>

