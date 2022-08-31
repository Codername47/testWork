<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="main">
    <div class="container">
        <div class="form-container">
            <form class="auth-form" action="../auth/authorizate" method="post">
                <h2>Авторизация</h2>
                <ul>
                    <li>
                        <label for="login">login
                        <input type="text" name="login">
                        </label>
                    </li>
                    <li>
                        <label for="password">password
                        <input type="password" name="password">
                        </label>
                    </li>
                    <li>
                        <button class="btn" type="submit">Войти</button>
                    </li>
                </ul>
            </form>
            <b class="msg"></b>
            <h4>Или вы можете зарегестрироваться: </h4>
            <a class="reg-link" href="../auth/register">Регистрация</a>
        </div>
    </div>
</div>
<script src="../js/jquery-3.6.0.js"></script>
<script src="../js/autorization.js"></script>
</body>
</html>
