<?php

namespace TestWork\Controller;

use TestWork\Core\Controller;
use TestWork\Model\Data\DatabaseConnect;
use TestWork\Model\Data\EntityManager;
use TestWork\Model\DBClasses\User;
use TestWork\Model\Repository\UserRepository;
use TestWork\Model\Security\Checker;
use TestWork\Model\Security\Registrator;

class Auth implements Controller
{
    private EntityManager $em;

    public function __construct()
    {
        Checker::checkUnauthorized();
        $this->em = EntityManager::getInstance("TestWork\Model\DBClasses\User", "../src/Model/Data/users.json");
    }

    public function index()
    {
        header('Location: /auth/authorization');
    }
    public function authorization()
    {
        require_once dirname(__DIR__)."/View/Authorization/authorization.php";
    }

    public function authorizate()
    {
        if($_SERVER['REQUEST_METHOD'] == "GET")
            header('Location: ../auth/authorization');
        if(isset($_POST["login"]) && isset($_POST["password"]))
        {
            $user = UserRepository::findByParam("username", trim($_POST['login']));
            if($user)
            {

                if ($user->getPassword() == md5((trim($_POST['password']).md5($user->getId()))))
                {
                    $user->createHashCookie();
                    $this->em->update($user);
                    $this->em->flush();

                    setcookie("id", $user->getID(), time()+60*60*24*30, "/");
                    setcookie("hash", $user->getHash(), time()+60*60*24*30, "/", null, null, true);

                    return;
                }
            }

        }
        echo "Неправильный логин или пароль";
    }

    public function logout()
    {
        setcookie("id", "", time() - 3600*24*30*12, "/");
        setcookie("hash", "", time() - 3600*24*30*12, "/", null, null, true);
        header("Location: /auth");
    }


    public function register()
    {
        require_once dirname(__DIR__)."/View/Register/register.php";
    }

    public function reg()
    {
        if($_SERVER['REQUEST_METHOD'] == "GET")
            header('Location: ../auth/register');

        if(strlen(trim($_POST['login'])) < 6)
        {
            echo "Логин должен быть не меньше 6-х символов";
            return;
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            echo "Неверный Email!";
            return;
        }

        if (!preg_match("/^[a-zA-Z]+$/", trim($_POST['name'])) && !preg_match("/^[a-яё]+$/", trim($_POST['name']))) {
            echo "Имя должно состоять только из букв латинского или русского алфавита";
            return;
        }
        if (strlen(trim($_POST['name'])) < 2)
        {
            echo "Имя должно состоять из 2-х или более букв";
            return;
        }
        if(strlen(trim($_POST['password'])) < 6)
        {
            echo "Пароль должен быть не меньше 6-х";
            return;
        }
        if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['password']))
        {
            echo "Пароль может состоять только из букв английского алфавита и цифр";
            return;
        }
        if($_POST['password'] != $_POST['repeatPassword'])
        {
            echo "Пароли должны совпадать";
            return;
        }
        $user = UserRepository::findByParam("username", trim($_POST['login']));
        if ($user)
        {
            echo "Существует пользователь с таким именем";
            return;
        }
        $user = UserRepository::findByParam("email", $_POST['email']);
        if ($user)
        {
            echo "Существует пользователь с таким email";
            return;
        }
        $user = new User();
        $user->setUsername(trim($_POST['login']));
        $user->setName(trim($_POST['name']));
        $user->setEmail($_POST['email']);
        $user->setPassword(trim($_POST['password']));
        $registrator = new Registrator();
        $registrator->registerUser($user);
        echo "Регистрация успешна!";
    }
}