<?php
class Reviews
{
    protected $id;
    protected $products_id;
    protected $users_id;
    protected $text;
    protected $date;

    function __construct(array $fields)
    {
        $this->id=$fields['id'];
        $this->products_id=$fields['products_id'];
        $this->users_id=$fields['users_id'];
        $this->text=$fields['test'];
        $this->date=$fields['date'];
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
        return $this->products_id;
    }

    /**
     * @return mixed
     */
    public function getUsersId()
    {
        return $this->users_id;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }
}