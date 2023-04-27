<?php
require "../../database/database.php";
require "check_admin.php";
?>
<link rel="stylesheet" href="../../fonts/icons/material-icons.css">
<link rel="stylesheet" href="../../css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<link rel="stylesheet" href="../../css/materialize.min.css">
<link rel="shortcut icon" href="../../img/favicon/favicon.png">

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Panel Admin</title>
</head>
<body>
<div>
    <h1 class="login-title">PANEL ADMIN</h1>
</div>
<div>
    <h2><a class="waves-effect waves-light btn" href="rights/manage_users.php">Gestion utilisateur</a></h2>
    <h2><a class="waves-effect waves-light btn" href="manage/home/manage_home.php">Gestion page d'accueil</a></h2>
    <h2><a class="waves-effect waves-light btn" href="manage/projects/manage_projects.php">Gestion page de projet</a></h2>
    <h2><a class="waves-effect waves-light btn" href="messages.php">Gestion des messages</a></h2>
    <h2><a class="waves-effect waves-light btn" href="manage/projects/add_project.php">Creation d'un projet</a></h2>
    <h2><a class="waves-effect waves-light btn" href="manage/carousel/manage_carousel.php">Gérer le carousel</a></h2>
    <h2><a class="waves-effect waves-light btn" href="manage/profiles/manage_profiles.php">Gérer les profils</a></h2>
    <h2><a class="waves-effect waves-light btn" href="../../index.php">Revenir à l'accueil</a></h2>

</div>
</body>
</html>
