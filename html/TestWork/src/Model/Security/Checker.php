<?php

namespace TestWork\Model\Security;

use TestWork\Model\DBClasses\User;
use TestWork\Model\Repository\UserRepository;

class Checker
{
    public static function check()
    {
        if (isset($_COOKIE['id']) && isset($_COOKIE['hash']))
        {
            $user = UserRepository::findByParam("id", $_COOKIE['id']);
            if (!$user || $user->getHash() != $_COOKIE['hash'] )
            {
                setcookie("id", "", time() - 3600*24*30*12, "/");
                setcookie("hash", "", time() - 3600*24*30*12, "/", null, null, true);
                $_SESSION['err'] = "Для просмотра страницы необходимо авторизоваться";
                header("Location: /auth");
                return;
            }
        }
        else
        {
            $_SESSION['err'] = "Для просмотра страницы необходимо авторизоваться";
            header("Location: /auth");
            return;
        }
    }

    public static function checkUnauthorized()
    {
        if (isset($_COOKIE['id']) && isset($_COOKIE['hash']))
        {
            header("Location: /");
        }
    }
}