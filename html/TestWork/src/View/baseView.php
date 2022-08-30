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
<?php
echo "<p><h1>Hello, ".$user->getName()."</h1></p>";
?>
<br>
<br>
<h4>nice to meet you</h4>
<?php
    echo "<p><b>id: </b>".$user->getID()."</p>";
    echo "<p><b>username: </b>".$user->getUsername()."</p>";
?>
<br>
<a href="auth/logout">Выйти</a>
</body>
</html>
