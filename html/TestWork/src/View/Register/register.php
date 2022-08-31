<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="main">
    <div class="container">
        <div class="form-container">
            <form class="reg-form" action="../auth/reg" method="post">
                <h2>Регистрация</h2>
                <ul>
                    <li>
                        <label for="login">login
                            <input name="login" type="text">
                        </label>
                    </li>
                    <li>
                        <label for="password">password
                            <input name="password" type="password">
                        </label>
                    </li>
                    <li>
                        <label for="repeatPassword">repeatPassword
                            <input name="repeatPassword" type="password">
                        </label>
                    </li>
                    <li>
                        <label for="email">email
                            <input name="email" type="email">
                        </label>
                    </li>
                    <li>
                        <label for="name">name
                            <input name="name" type="text">
                        </label>
                    </li>
                    <li>
                        <button class="btn" type="submit">Отправить</button>
                    </li>
                </ul>
                <b class="msg"></b>
                <a class="auth-link" href="/">К авторизации</a>
            </form>
        </div>
    </div>
</div>

<script src="../js/jquery-3.6.0.js"></script>
<script src="../js/register.js"></script>
</body>
</html>
