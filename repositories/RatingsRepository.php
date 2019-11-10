<?php
class RatingsRepository
{
    public function getByUserProduct(int $userId, int $productId){
        global $DB;
        $objRating = null;
        $query ="SELECT * FROM rating WHERE products_id={$productId} and users_id={$userId}";
        $result = mysqli_query($DB, $query) or die("Ошибка " . mysqli_error($DB));
        if ($result) {
            $row = $result->fetch_assoc(); //возвращ асоц масив, ключи соответст поляв в базе данных
            if ($row) {
                $objRating = new Rating($row);
            }
        }
        return $objRating;
    }
}
