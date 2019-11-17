<?php
$pageTitle = 'Cartier';

$pageSize = intval($_GET['size'] ?? 6);
$groupsId = intval($_GET['groups'] ?? 1);
$pageNum = intval($_GET['page'] ?? 1);
$productFilter = $_GET['filter']??[];

require_once "./header.php";
require_once "./menu-catalog.php";
require_once "./filter.php";
?>

<?php
$catalog = $productsRepository->getByGroupId($groupsId, $pageSize, $pageNum);
//$catalog = $productsRepository->getByParams($groupsId, $pageSize, $pageNum, $productFilter);
?>

<section>
    <div class="container">
        <div class="row">
            <?php foreach ($catalog as $product): ?>
                <div class="col-xs-12 col-sm-6 col-lg-4 mb-3 mt-3">
                    <div class="text-center" data-productarticle="<?= $product->getArticle() ?>">
                        <?php $img = "/img/" . $product->getArticle() . ".png"; ?>
                        <div><img src="<?= $img ?>"></div>
                        <div class="text-dark">
                            <a href="/product.php?article=<?= $product->getArticle() ?>"
                               class="text-dark"
                            >
                                <?= $product->getName() ?><br><?= $product->getModel() ?>
                            </a>
                        </div>
                        <div class="text-secondary"><?= $product->getMaterial() ?></div>
                        <div class="price"><span><?= $product->getPrice() ?></span> грн</div>
                        <button class="btn btn-add-basket btn-secondary">
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
