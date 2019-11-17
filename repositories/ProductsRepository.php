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

    /* getByParams  пока не работает*/
    public function getByParams($groupsId, $pageSize = null, $pageNum = null, array $filter = [])
    {
        global $DB;
        $catalog = [];

        /*

        SELECT p.id AS id, p.groups_id as groups_id, p.name as name, p.article as article, p.price as price, c.name as char_name, c.code as char_code, pc.value
        FROM  products2_characteristics AS pc
        JOIN products2 AS p ON pc.products2_id = p.id
        JOIN characteristics AS c ON pc.characteristics_id = c.id
        WHERE p.groups_id=1 ORDER BY p.id
        ;


        SELECT p.id AS id, p.groups_id as groups_id, p.name as name, p.article as article, p.price as price, c.name as char_name, c.code as char_code, pc.value
        FROM  products2_characteristics AS pc
        JOIN products2 AS p ON pc.products2_id = p.id
        JOIN characteristics AS c ON pc.characteristics_id = c.id
        WHERE p.groups_id=1 AND ((c.code='model' AND pc.value='маленькая модель') OR (c.code='material' AND pc.value='золото') OR (c.code='color' AND pc.value='белый'))
        ;
        */

        $query = "SELECT p.id AS id, p.groups_id as groups_id, p.name as name, p.article as article, p.price as price, c.name as char_name, c.code as char_code, pc.value 
FROM  products2 AS p, characteristics AS c, products2_characteristics AS pc 
JOIN ON pc.products2_id = p.id 
JOIN ON pc.characteristics_id = c.id 
WHERE p.groups_id={$groupsId}";





        //$query = "SELECT * FROM products WHERE groups_id={$groupsId}";
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



/*

SELECT p.id AS id, p.groups_id as groups_id, p.name as name, p.article as article, p.price as price, c.name as char_name, c.code as char_code, pc.value
FROM  products2_characteristics AS pc
JOIN products2 AS p ON pc.products2_id = p.id
JOIN characteristics AS c ON pc.characteristics_id = c.id
WHERE p.groups_id=1 ORDER BY p.id
;


SELECT p.id AS id, p.groups_id as groups_id, p.name as name, p.article as article, p.price as price, c.name as char_name, c.code as char_code, pc.value
FROM  products2_characteristics AS pc
JOIN products2 AS p ON pc.products2_id = p.id
JOIN characteristics AS c ON pc.characteristics_id = c.id
WHERE p.groups_id=1 AND ((c.code='model' AND pc.value='маленькая модель') OR (c.code='material' AND pc.value='золото') OR (c.code='color' AND pc.value='белый'))
;
*/
