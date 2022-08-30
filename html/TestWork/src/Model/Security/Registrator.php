<?php

namespace TestWork\Model\Security;

use TestWork\Model\Data\DatabaseConnect;
use TestWork\Model\Data\EntityManager;
use TestWork\Model\DBClasses\User;

class Registrator
{
    private $em;
    public function __construct()
    {
        $this->em = EntityManager::getInstance("TestWork\Model\DBClasses\User");
    }

    public function registerUser(User $user)
    {
        $user->hashPassword();
        $this->em->persist($user);
        $this->em->flush();
    }
}