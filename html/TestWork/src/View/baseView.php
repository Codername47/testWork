<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="main">
    <div class="container">
        <div class="info-container">
            <div class="info">
                <?php
                echo "<p class='hello'><h1>Hello, ".$user->getName()."</h1></p>";
                ?>
                <br>
                <br>
                <h4>nice to meet you</h4>
                <?php
                echo "<p><b>id: </b>".$user->getID()."</p>";
                echo "<p><b>username: </b>".$user->getUsername()."</p>";
                ?>
            </div>
            <a class="logout-link" href="auth/logout">Выйти</a>
        </div>
    </div>
</div>

</body>
</html>
