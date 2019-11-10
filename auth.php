<?php define('DISABLE_AUTH_FORM', false); ?>

<?php
if (!$_SESSION['user']) {
    if (array_key_exists("login", $_POST) && array_key_exists("password", $_POST)) {
        $login = trim($_POST['login']);
        $password = trim($_POST['password']);
        $query = "SELECT login,password,id FROM users WHERE login='{$login}' and password='{$password}'";
        $result = mysqli_query($DB, $query) or die("Ошибка " . mysqli_error($DB));
        if ($row = $result->fetch_assoc()) {
            $_SESSION['user'] = $row['login'];
            $_SESSION['userId'] = intval($row['id']);
        };
    }
}
?>

<?php if (!$_SESSION['user']): ?>
    <?php if (DISABLE_AUTH_FORM === false): ?>
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
<?php else: ?>
    Hello <?= $_SESSION['user'] ?>!
<?php endif; ?>






