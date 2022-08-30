<?php

namespace TestWork\Model\DBClasses;

use TestWork\Model\Algorythms\RandomGenerator;
use TestWork\Model\Data\DatabaseConnect;

class User extends Model implements \JsonSerializable
{
    const DATABASE_FILE = "../src/Model/Data/db.json";
    private string $username;
    private string $email;
    private string $password;
    private string $name;
    private ?string $hash = null;


    public function __construct()
    {
        parent::__construct();
    }

    public function jsonSerialize()
    {
        return array_merge(['id' => $this->getId()], get_object_vars($this));
    }

    public function hashPassword()
    {
        $this->initId();
        $this->password = md5($this->password.md5($this->getId()));
    }

    public function createHashCookie()
    {
        $this->hash = md5(RandomGenerator::generateCode(10));
    }

    public function setParams($object)
    {
       $this->email = $object->email;
       $this->username = $object->username;
       $this->password = $object->password;
       $this->name = $object->name;
       $this->hash = $object->hash;
    }


    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getHash()
    {
        return $this->hash;
    }

    public function getUsername()
    {
        return $this->username;
    }
    public function setUsername($username)
    {
        $this->username = $username;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
}