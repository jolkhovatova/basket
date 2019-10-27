<?php
$catalog = [
    [
        "article" => "1",
        "name" => "Браслет Love",
        "model" => "маленькая модель",
        "material" => "желтое золото",
        "price" => "118400",
    ],
    [
        "article" => "2",
        "name" => "Браслет Love",
        "model" => "маленькая модель",
        "material" => "розовое золото",
        "price" => "118400",
    ],
    [
        "article" => "3",
        "name" => "Браслет Love",
        "model" => "маленькая модель",
        "material" => "белое золото",
        "price" => "148400",
    ],
    [
        "article" => "4",
        "name" => "Браслет Love",
        "model" => "4 бриллианта",
        "material" => "белое золото, бриллианты",
        "price" => "316 000",
    ],
    [
        "article" => "5",
        "name" => "Браслет Love",
        "model" => "4 бриллианта",
        "material" => "желтое золото, бриллианты",
        "price" => "296000",
    ],
    [
        "article" => "6",
        "name" => "Браслет Love",
        "model" => "4 бриллианта",
        "material" => "розовое золото, бриллианты",
        "price" => "296000",
    ],

];


function getProductByArticle($article){
    global $catalog;
    foreach($catalog as $product){
        if ($product['article'] === $article){
            return $product;
        }
    }
};
