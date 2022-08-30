<?php

namespace TestWork\Model\Data;

use PDO;
use PDOException;

class DatabaseConnect
{
    use MultitonTrait;
    private array $data = [];


    public function connect()
    {
        if (!file_exists($this->route))
        {
            file_put_contents($this->route, json_encode(array()));
        }
        $data = json_decode(file_get_contents($this->route));
        if (is_array($data))
            $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }
}