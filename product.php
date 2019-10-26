<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Cartier</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

<?php require_once "./header.php"?>

<div class="empty-space"></div>

<?php require_once "./catalog.php"; ?>

<section>

    <button><a class="btn-add-basket" href="/index.php">Вернуться</a></button>


            <div class="product" data-productarticle="1">
                <?php $img = "/img/1.png"; ?>
                <div><img src="<?= $img ?>"></div>
                <div class="name">
                    <a href="/product.php">gfgf <br>hjhjh</a>
                </div>
                <div class="material">vfvfvfv</div>
                <div class="price"><span>17171717</span>грн</div>
                <button><a class="btn-add-basket" href="#">В корзину</a></button>
            </div>
</section>

<?php require_once "./footer.php"; ?>

</body>
</html>

