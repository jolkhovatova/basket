<?php
class Basket
{
    protected $name;
    protected $article;
    protected $model;
    protected $price;
    protected $groupId;
    protected $material;
    protected $id;

    function __construct(array $fields)
    {
        $this->name = $fields['name'];
        $this->article = $fields['article'];
        $this->model = $fields['model'];
        $this->price = floatval($fields['price']);
        $this->groupId = intval($fields['groups_id']);
        $this->material = $fields['material'];
        $this->id = intval($fields['id']);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getGroupId(): int
    {
        return $this->groupId;
    }

    /**
     * @return mixed
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}