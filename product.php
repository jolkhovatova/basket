<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Cartier</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

<?php require_once "./header.php" ?>
<div class="empty-space"></div>
<?php require_once "./catalog.php"; ?>

<section>
    <button><a class="btn-add-basket" href="/index.php">Вернуться</a></button>
    <div class="catalog">

        <?php
        $productArticle = $_GET['article'];
        $product = getProductByArticle($productArticle);
        ?>

        <div class="product" data-productarticle="<?= $product['article'] ?>">
            <?php $img = "/img/" . $product['article'] . ".png"; ?>
            <div><img src="<?= $img ?>"></div>
            <div class="name"><?= $product['name'] ?> <br><?= $product['model'] ?>
            </div>
            <div class="material"><?= $product['material'] ?></div>
            <div class="price"><span><?= $product['price'] ?></span> грн</div>
            <button><a class="btn-add-basket" href="#">В корзину</a></button>
        </div>

    </div>
</section>

<?php require_once "./footer.php"; ?>

</body>
</html>

