<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Cartier</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<section class="head">
    <div class="basket">
        <div class="basket-img">
            <span class="count">0</span>
            <img src="img/basket.png" alt="">
        </div>
        <div class="basket-open">
            <table>
                <tbody></tbody>
            </table>
        </div>
    </div>

    <div class="logo">
        <img src="img/Cartier_logo_mobile.png" alt="">
    </div>
    <div class="menu">
        <nav>
            <div class="brd">
                <ul>
                    <li class="active">Браслеты</li>
                    <li>Кольца</li>
                    <li>Серги</li>
                    <li>Колье</li>
                    <li>Часы</li>
                </ul>
            </div>
        </nav>
    </div>
</section>

<div class="empty-space"></div>

<?php require_once "./catalog.php"; ?>

<section>

    <div class="catalog">
        <?php foreach ($catalog as $product): ?>
            <div class="product" data-productarticle="<?= $product['article'] ?>">
                <?php $img = "img/" . $product['article'] . ".png"; ?>
                <div><img src="<?= $img ?>"></div>
                <div class="name"><?= $product['name'] ?> <br><?= $product['model'] ?></div>
                <div class="material"><?= $product['material'] ?></div>
                <div class="price"><span><?= $product['price'] ?></span>грн</div>
                <button><a href="#">В корзину</a></button>
            </div>
        <?php endforeach; ?>

    </div>
</section>

<section class="info">
    <div>
        <ul>
            <li><p>г. Киев</p></li>
            <li><p>ул. Архитектора Городецкого, 17/1</p></li>
            <li><p>Часы работы 11:00-20:00</p></li>
            <li><p>044 393 3973</p></li>
        </ul>
    </div>
</section>
<template id="basketRow">
    <tr data-productarticle="">
        <td class="img"><img src="" alt=""></td>
        <td class="name"></td>
        <td class="quantity">
        <td class="ctrl">
            <div>
                <button class="plus" type="button">+</button>
            </div>
            <div>
                <button class="minus" type="button">-</button>
            </div>
        </td>
        <td class="price"></td>
        <td class="delete">удалить</td>
    </tr>
</template>

<script src="js/basket.js"></script>
<script src="js/page.js"></script>
<script src="js/main.js"></script>

</body>
</html>

