<?php

namespace TestWork\Controller;

use TestWork\Core\Controller;
use TestWork\Model\DBClasses\User;
use TestWork\Model\Repository\UserRepository;
use TestWork\Model\Security\Checker;

class MainController implements Controller
{
    public function __construct()
    {
        Checker::check();
    }

    public function index()
    {
        $user = UserRepository::findByParam("id", $_COOKIE["id"]);
        require_once dirname(__DIR__) . "/View/baseView.php";
    }
}