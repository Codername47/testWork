<?php

namespace TestWork\Model\Repository;

interface Repository
{
    public static function findByParam($param, $value);
}