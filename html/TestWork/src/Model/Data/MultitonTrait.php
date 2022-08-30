<?php

namespace TestWork\Model\Data;

trait MultitonTrait
{
    private static array $instance = [];
    private string $entityClass;
    private string $route;

    private function __construct($entityClass, $route){
        $this->route = $route;
        $this->entityClass = $entityClass;
    }
    private function __clone(){}

    public static function getInstance($class, $route = null)
    {
        if (!array_key_exists($class, self::$instance)){
            self::$instance[$class] = new self($class, $route);
        }

        return self::$instance[$class];
    }
}