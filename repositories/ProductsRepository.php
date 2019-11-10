<?php

class ProductsRepository
{

    public function getProductByArticle($article)
    {
        global $DB;
        $objProduct = null;
        $query = "SELECT * FROM products WHERE article='{$article}'";
        $result = mysqli_query($DB, $query) or die("Ошибка " . mysqli_error($DB));
        if ($result) {
            $row = $result->fetch_assoc(); //возвращ асоц масив, ключи соответст поляв в базе данных
            if ($row) {
                $objProduct = new Product($row);
            }
        }
        return $objProduct;
    }

}


