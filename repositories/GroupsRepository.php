<?php

class GroupsRepository
{

    /**
     * @return Groups[]
     */
    public function getAll()
    {
        global $DB;
        $groups = [];
        $query = "SELECT * FROM groups";
        $result = mysqli_query($DB, $query) or die("Ошибка " . mysqli_error($DB));
        if($result){
            while ($row = $result->fetch_assoc()){
                $group = new Groups($row);
                $groups[] = $group;
            }
        }
        return $groups;
    }


}