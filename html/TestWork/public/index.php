<?php

use TestWork\Model\Data\DatabaseConnect;
use TestWork\Model\Data\EntityManager;
use TestWork\Model\DBClasses\User;

require_once dirname(__DIR__).'/vendor/autoload.php';

$em = EntityManager::getInstance("TestWork\Model\DBClasses\User", "../src/Model/Data/users.json");
session_start();
\TestWork\Core\Route::start();