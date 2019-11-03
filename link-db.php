<?php
$host = 'dockerlamp_mariadb_1'; // адрес сервера
$database = 'cartier'; // имя базы данных
$user = 'root'; // имя пользователя
$password = 'rootpwd'; // пароль

$DB = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqli_error($DB));
mysqli_query($DB,'SET NAMES utf8');