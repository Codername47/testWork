<?php

namespace TestWork\Model\DBClasses;

use TestWork\Model\Data\DatabaseConnect;
use TestWork\Model\Data\EntityManager;

abstract class Model
{

    private int $id;
    private array $friendly = ["TestWork\Model\Data\DatabaseConnect", "TestWork\Model\Data\EntityManager"];

    public function __construct()
    {
    }

    abstract function setParams($object);



    public function initId()
    {
        if ((isset($this->id)))
            return;
        $id = 1;

        $em = EntityManager::getInstance(get_class($this));
        $data = $em->getData();
        foreach ($data as $entity) {
            if ($entity->getId() >= $id)
                $id = $entity->getId() + 1;
        }

        $this->id = $id;


    }

    public function setId(int $id)
    {
        $trace = debug_backtrace();
        if (isset($trace[1]['class']) && in_array($trace[1]["class"], $this->friendly))
        {
            $this->id = $id;
        }
    }

    public function getId()
    {
        return $this->id;
    }
}