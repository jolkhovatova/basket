<?php define('DISABLE_AUTH_FORM', true);?>
<?php $pageTitle = 'Cartier'; ?>
<?php require_once "./header.php"; ?>

<div class="row">
    <div class="col-12">
        <form method="post" action="" class="form-inline mx-3">
            <input type="text" class="form-control" placeholder="Name" name="name">
            <input type="text" class="form-control" placeholder="Login" name="login">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <input type="password" class="form-control" placeholder="Confirm the password" name="confirm">
            <input type="submit" value="Send Form">
        </form>
    </div>
</div>

<?php
if(!empty($_POST)){
    $name = trim($_POST['name']);
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    $confirm = trim($_POST['confirm']);
    if (!empty($name)) {
        if (!empty($login)) {
            if ($password === $confirm) {
                $query = "SELECT * FROM users WHERE login='{$login}'";
                $result = mysqli_query($DB, $query) or die("Ошибка " . mysqli_error($DB));
                if ($fields = $result->fetch_assoc()) {
                    echo "Такой login уже существует!";
                } else {
                    $query = "INSERT INTO users(login, password, name ) VALUE ('{$login}','{$password}','{$name}')";
                    $result = mysqli_query($DB, $query) or die("Ошибка " . mysqli_error($DB));
                    if (!$result) {
                        echo "Ошибка добавления пользователя!";
                    }
                }
            } else {
                echo "Пароль и подтверждение не совпадают!";
            }
        } else {
            echo "Поле login не заполнено!";
        }
    } else {
        echo "Поле name не заполнено!";
    }
}
?>

<?php require_once "./footer.php"; ?>
