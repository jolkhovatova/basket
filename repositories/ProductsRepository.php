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


    public function getByGroupId($groupsId, $pageSize = null, $pageNum = null)
    {
        global $DB;
        $catalog = [];

        $query = "SELECT * FROM products WHERE groups_id={$groupsId}";
        if($pageSize && $pageNum){
            $offset = $pageSize * ($pageNum - 1);
            $query .= " LIMIT {$offset},{$pageSize}";
        }

        $result = mysqli_query($DB, $query) or die("Ошибка " . mysqli_error($DB));
        if($result){
            while ($row = $result->fetch_assoc()){
                $product = new Product($row);
                $catalog[] = $product;
            }
        }
        return $catalog;
    }


}

