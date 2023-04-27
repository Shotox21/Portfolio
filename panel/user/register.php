<?php
    require "../../database/database.php";
?>
<link rel="stylesheet" href="../../css/style.css">
<link rel="shortcut icon" href="../../img/favicon/favicon.png">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body id="register_page_main">
<div>
    <h1>INSCRIPTION</h1>
</div>
    <form action="registerform.php" method="post">
        <input type="text" id="username" name="username" placeholder="username" required>
        <input type="password" id="password" name="password" placeholder="password" required>
        <input type="email" id="email" name="email" placeholder="email" required>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

