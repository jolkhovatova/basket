<?php
class Groups
{
    protected $id;
    protected $name;

    function __construct(array $fields)
    {
        $this->id=$fields['id'];
        $this->name=$fields['name'];
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
    public function getName()
    {
        return $this->name;
    }
}