<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form class="reg-form" action="../auth/reg" method="post">
    <h2>Регистрация</h2>
    <ul>
        <li>
            <label for="login">login</label>
            <input name="login" type="text">
        </li>
        <li>
            <label for="password">password</label>
            <input name="password" type="password">
        </li>
        <li>
            <label for="repeatPassword">repeatPassword</label>
            <input name="repeatPassword" type="password">
        </li>
        <li>
            <label for="email">email</label>
            <input name="email" type="email">
        </li>
        <li>
            <label for="name">name</label>
            <input name="name" type="text">
        </li>
        <li>
            <button type="submit">Отправить</button>
        </li>
    </ul>
    <b class="msg"></b>
    <a href="/">К авторизации</a>
</form>
<script src="../js/jquery-3.6.0.js"></script>
<script src="../js/register.js"></script>
</body>
</html>
