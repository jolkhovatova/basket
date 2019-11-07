<?php
class User
{
    private $id;
    private $login;
    private $password;
    private $name;

    function __construct(array $fields)
    {
        $this->id = $fields['id'];
        $this->login = $fields['login'];
        $this->password = $fields['password'];
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
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

}