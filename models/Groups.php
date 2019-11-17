<?php
class Groups
{
    protected $id;
    protected $name;

    function __construct(array $fields)
    {
        $this->id=intval($fields['id']);
        $this->name=$fields['name'];
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}