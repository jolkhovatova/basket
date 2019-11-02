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

<?php

require_once './models/Product.php';

require_once "./header.php";

$query ="SELECT * FROM products";
$result = mysqli_query($DB, $query) or die("Ошибка " . mysqli_error($DB));
if($result)
{
    //$catalog = $result->fetch_all(MYSQLI_ASSOC);
    $catalog = [];

    while($fields = $result->fetch_assoc()){
        $objProduct = new Product($fields);
        $catalog[] = $objProduct;
    }

}

?>

<div class="empty-space"></div>

<?//php require_once "./catalog.php"; ?>

<section>
    <div class="container">
        <div class="row">

            <?php foreach ($catalog as $objProduct):?>
            <div class="col-xs-12 col-sm-6 col-lg-4 mb-3 mt-3">

                <div class="text-center" data-productarticle="<?= $objProduct->getArticle() ?>">
                    <?php $img = "/img/" . $objProduct->getArticle() . ".png"; ?>
                    <div><img src="<?= $img ?>"></div>
                    <div class="text-dark">
                        <a href="/product.php?article=<?= $objProduct->getArticle() ?>"
                           class="text-dark"><?= $objProduct->getName() ?>
                            <br><?= $objProduct->getModel() ?></a>
                    </div>
                    <div class="text-secondary"><?= $objProduct->getMaterial() ?></div>
                    <div class="price"><span><?= $objProduct->getPrice() ?></span> грн</div>
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

