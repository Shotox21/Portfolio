<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LOGOUT</title>
    <?php
        include ('../../database/database.php');
        if(isset($_SESSION)) {
            session_destroy();
            header("Location:../../index.php");
        } else {
            echo "Vous n'êtes pas connecté!";
        }

    ?>
    <a href="../../index.php">Revenez sur la page d'accueil</a>
