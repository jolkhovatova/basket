<?php
$pageTitle = 'Cartier';
require_once "./header.php";
require_once "./menu-catalog.php";
?>

<?php
$pageSize = intval($_GET['size'] ?? 6);
$groupsId = intval($_GET['groups'] ?? 1);
$pageNum = intval($_GET['page'] ?? 1);

$offset = $pageSize * ($pageNum - 1);
$query = "SELECT * FROM products WHERE groups_id={$groupsId} LIMIT {$offset},{$pageSize}";

$result = mysqli_query($DB, $query) or die("Ошибка " . mysqli_error($DB));
$catalog = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $objProduct = new Product($row); //row = fields
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
            <div class="col-1"></div>
            <div class="col-10">
                <ul class="nav nav-tabs justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="/index.php?groups=<?= $groupsId ?>&page=1&size=<?=$pageSize?>">1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/index.php?groups=<?= $groupsId ?>&page=2&size=<?=$pageSize?>">2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/index.php?groups=<?= $groupsId ?>&page=3&size=<?=$pageSize?>">3</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/index.php?groups=<?= $groupsId ?>&page=4&size=<?=$pageSize?>">4</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/index.php?groups=<?= $groupsId ?>&page=5&size=<?=$pageSize?>">5</a>
                    </li>
                </ul>
            </div>
            <div class="col-1">
                <form method="get" action="/index.php">
                    <input type="hidden" name="groups" value="<?= $groupsId ?>">
                    <input type="hidden" name="page" value="<?= $pageNum ?>">
                    <select id="selectPageSize" name="size">
                        <?php foreach([3,6,9] as $s):?>
                            <?php $selected = ($pageSize == $s)?'selected':'';?>
                            <option value="<?=$s?>" <?=$selected?> >
                                <?=$s?>
                            </option>
                        <? endforeach;?>
                        <!--
                        <option value="3">3</option>
                        <option value="6" selected>6</option>
                        <option value="9">9</option>
                        -->
                    </select>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require_once "./footer.php"; ?>
