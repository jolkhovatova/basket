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

    <div class="catalog">
        <?php foreach ($catalog as $product): ?>
            <div class="product" data-productarticle="<?= $product['article'] ?>">
                <?php $img = "/img/" . $product['article'] . ".png"; ?>
                <div><img src="<?= $img ?>"></div>
                <div class="name">
                    <a href="/product.php?article=<?= $product['article'] ?>"><?= $product['name'] ?>
                        <br><?= $product['model'] ?></a>
                </div>
                <div class="material"><?= $product['material'] ?></div>
                <div class="price"><span><?= $product['price'] ?></span> грн</div>
                <button class="btn-add-basket">
                    <a class="btn-add-basket" href="#">В корзину</a>
                </button>
            </div>
        <?php endforeach; ?>

    </div>
</section>

<?php require_once "./footer.php"; ?>

</body>
</html>

