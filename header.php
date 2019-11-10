<?php require_once "./init.php"?>
<?
$pageTitle = $pageTitle ?? 'Cartier';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=$pageTitle?></title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/main2.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
    >
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link d-lg-none active" href="#">Браслеты</a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-lg-none" href="#">Кольца</a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-lg-none" href="#">Серги</a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-lg-none" href="#">Колье</a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-lg-none" href="#">Часы</a>
            </li>

            <li class="nav-item">
                <a href="#">
                    <img src="img/basket.png" alt="">
                </a>
            </li>
            <?php require_once "./auth.php"; ?>
        </ul>
    </div>
</nav>

<section class="head">
    <div class="container-fluid">
        <div class="row text-center justify-content-center">
            <div class="col-12">
                <img src="img/Cartier_logo_mobile.png" alt="" class="rounded-pill shadow p-3 mb-5 bg-white rounded">
            </div>
        </div>
    </div>
</section>


