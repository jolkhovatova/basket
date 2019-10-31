<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Cartier</title>
    <!-- <link rel="stylesheet" href="css/main.css"> -->
    <link rel="stylesheet" href="css/main2.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-reboot.css">
</head>
<body>

<?php require_once "./header.php" ?>

<div class="empty-space"></div>

<?php require_once "./catalog.php"; ?>

<section>
    <div class="container">
        <div class="row">

            <?php foreach ($catalog as $product):?>
            <div class="col-xs-12 col-sm-6 col-lg-4 mb-3 mt-3">

                <div class="text-center" data-productarticle="<?= $product['article'] ?>">
                    <?php $img = "/img/" . $product['article'] . ".png"; ?>
                    <div><img src="<?= $img ?>"></div>
                    <div class="text-dark">
                        <a href="/product.php?article=<?= $product['article'] ?>"
                           class="text-dark"><?= $product['name'] ?>
                            <br><?= $product['model'] ?></a>
                    </div>
                    <div class="text-secondary"><?= $product['material'] ?></div>
                    <div class="price"><span><?= $product['price'] ?></span> грн</div>
                    <button class="btn-add-basket btn btn-secondary">
                        <a class="btn-add-basket text-white" href="#">В корзину</a>
                    </button>
                </div>

            </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>

<?php require_once "./footer.php"; ?>

</body>
</html>

