<?php

class CharacteristicsRepository
{
    /**
     * @return Characteristics[]
     */
    public function getAll()
    {
        global $DB;
        $characteristics = [];
        $query = "SELECT * FROM characteristics";
        $result = mysqli_query($DB, $query) or die("Ошибка " . mysqli_error($DB));
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $characteristic = new Characteristics($row);
                $characteristics[] = $characteristic;
            }
        }
        return $characteristics;
    }
}