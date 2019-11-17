<?php
class ProdChar
{
    protected $id;
    protected $productsId;
    protected $characteristicsId;
    protected $value;

    function __construct(array $fields)
    {
        $this->id=intval($fields['id']);
        $this->productsId=intval($fields['productId']);
        $this->characteristicsId=intval($fields['$characteristicsId']);
        $this->value=$fields['value'];

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
    public function getCharacteristicsId()
    {
        return $this->characteristicsId;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}