<?php
    require "../../database/database.php";
?>
<link rel="stylesheet" href="../../css/style.css">
<link rel="shortcut icon" href="../../img/favicon/favicon.png">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body id="connect_page_main">
<h1>CONNEXION</h1>
<form action="loginform.php" method="post">
    <input type="text" id="username" name="username" placeholder="username" required>
    <input type="password" id="password" name="password" placeholder="password" required>
    <input id="submit" type="submit" value="Submit">
    <a href="register.php">Inscription</a>
</form>
</body>
</html>