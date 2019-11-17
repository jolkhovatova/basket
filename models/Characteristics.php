<?php
class Characteristics
{
    protected $id;
    protected $name;
    protected $code;

    function __construct(array $fields)
    {
        $this->id=intval($fields['id']);
        $this->name=$fields['name'];
        $this->code=$fields['code'];
    }

    /**
     * @return int
     */
    public function getId(): int
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

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

}