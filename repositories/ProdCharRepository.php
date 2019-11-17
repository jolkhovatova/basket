<?php

class ProdCharRepository
{
    function getByProductId(int $productId)
    {

    }

    /**
     * @param int $characteristicId
     * @return ProdChar[]
     */
    function getUniqByCharacteristicId(int $characteristicId)
    {
        global $DB;
        $uniqValues = [];
        $query = "SELECT DISTINCT value, 0 as products2_id, 0 as characteristics_id, 0 as id 
                  FROM products2_characteristics 
                  WHERE characteristics_id={$characteristicId}";
        $result = mysqli_query($DB, $query) or die("Ошибка " . mysqli_error($DB));
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $uniqValue = new ProdChar($row);
                $uniqValues[] = $uniqValue;
            }
        }
        return $uniqValues;
    }


}