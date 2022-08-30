<?php

namespace TestWork\Model\Repository;

use TestWork\Model\Data\EntityManager;
use TestWork\Model\Data\MultitonTrait;
use TestWork\Model\DBClasses\User;

class UserRepository implements Repository
{
    const DATABASE_STR = "../src/Model/Data/users.json";

    public static function findByParam($param, $value): ?User
    {
        $em = EntityManager::getInstance("TestWork\Model\DBClasses\User");
        $param = strtoupper($param[0]).substr($param, 1);
        $findFunc = "get".$param;
        foreach ($em->getData() as $item) {
            if($item->$findFunc() == $value)
            {
                return $item;
            }

        }
        return null;
    }
}