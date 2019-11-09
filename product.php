<?php require_once "./header.php" ?>

<?php
$productArticle = $_GET['article'];
$product = $productsRepository->getProductByArticle($productArticle);
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <button class="btn"><a href="/index.php">Вернуться</a></button>
            </div>
        </div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="product text-center" data-productarticle="<?= $product->getArticle() ?>">
                    <?php $img = "/img/" . $product->getArticle() . ".png"; ?>
                    <div><img src="<?= $img ?>"></div>
                    <div class="name text-dark"><?= $product->getName() ?> <br><?= $product->getModel() ?>
                    </div>
                    <div class="material text-secondary"><?= $product->getMaterial() ?></div>
                    <div class="price"><span><?= $product->getPrice() ?></span> грн</div>
                    <button class="btn btn-add-basket btn-secondary">
                        <a class="btn-add-basket text-white" href="#">В корзину</a>
                    </button>
                </div>
            </div>
            <div class="col-4"></div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="rating">
                    Ваша оценка:
                    <?php $youRating = 4; ?>
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <?php $class = ($youRating >= $i) ? 'class = "star-on"' : ''; ?>
                        <button data-value="<?= $i ?>" <?= $class ?> >
                            <?= $i ?>
                        </button>
                    <?php endfor; ?>
                </div>
                <div class="rating-avg">
                    Средний рейтинг: <span>4</span>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once "./footer.php"; ?>

</body>
</html>
