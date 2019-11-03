<?php $pageTitle = 'Cartier'; ?>

<?php require_once "./header.php"; ?>
<?php require_once "./menu-catalog.php"; ?>

<?php
$pageSize = 6;
$groupsId = intval($_GET['groups'] ?? 1);
$pageNum = intval($_GET['page'] ?? 1);

$offset = $pageSize * ($pageNum - 1);
$query = "SELECT * FROM products WHERE groups_id={$groupsId} LIMIT {$offset},{$pageSize}";

$result = mysqli_query($DB, $query) or die("Ошибка " . mysqli_error($DB));
$catalog = [];
if ($result) {
    while ($fields = $result->fetch_assoc()) {
        $objProduct = new Product($fields);
        $catalog[] = $objProduct;
    }
}
?>

<section>
    <div class="container">
        <div class="row">
            <?php foreach ($catalog as $objProduct): ?>
                <div class="col-xs-12 col-sm-6 col-lg-4 mb-3 mt-3">
                    <div class="text-center" data-productarticle="<?= $objProduct->getArticle() ?>">
                        <?php $img = "/img/" . $objProduct->getArticle() . ".png"; ?>
                        <div><img src="<?= $img ?>"></div>
                        <div class="text-dark">
                            <a href="/product.php?article=<?= $objProduct->getArticle() ?>"
                               class="text-dark"
                            >
                                <?= $objProduct->getName() ?><br><?= $objProduct->getModel() ?>
                            </a>
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
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tabs justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="/index.php?groups=<?= $groupsId ?>&page=1">1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/index.php?groups=<?= $groupsId ?>&page=2">2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/index.php?groups=<?= $groupsId ?>&page=3">3</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/index.php?groups=<?= $groupsId ?>&page=4">4</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/index.php?groups=<?= $groupsId ?>&page=5">5</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php require_once "./footer.php"; ?>
