<?php
class Rating
{
    protected $id;
    protected $productsId;
    protected  $usersId;
    protected  $value;

    function __construct(array $fields)
    {
        $this->id = $fields['id'];
        $this->productsId = $fields['products_id'];
        $this->usersId = $fields['users_id'];
        $this->value = intval($fields['value']);

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getProductsId()
    {
        return $this->productsId;
    }

    /**
     * @return mixed
     */
    public function getUsersId()
    {
        return $this->usersId;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }
}
