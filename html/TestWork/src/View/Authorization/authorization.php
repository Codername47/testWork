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
<form class="auth-form" action="../auth/authorizate" method="post">
    <h2>Авторизация</h2>
    <ul>
        <li>
            <label for="login">login</label>
            <input type="text" name="login">
        </li>
        <li>
            <label for="password">password</label>
            <input type="text" name="password">
        </li>
        <li>
            <button type="submit">Войти</button>
        </li>
    </ul>
</form>
<b class="msg"></b>
<h4>Или вы можете зарегестрироваться: </h4>
<a href="../auth/register">Регистрация</a>
<script src="../js/jquery-3.6.0.js"></script>
<script src="../js/autorization.js"></script>
</body>
</html>
