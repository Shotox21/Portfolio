<?php
require "../../../../database/database.php";
require "../../check_admin.php";
?>

<link rel="stylesheet" href="../../../../fonts/icons/material-icons.css">
<link rel="stylesheet" href="../../../../css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<link rel="stylesheet" href="../../../../css/materialize.min.css">
<link rel="shortcut icon" href="../../../../img/favicon/favicon.png">


<form method="post" action="add_image.php" enctype="multipart/form-data">
    <label for="carousel_image">Image:</label><br>
    <input type="file" name="carousel_image"><br>

    <label for="image_alt">ALT de l'Image:</label><br>
    <input type="text" name="image_alt"><br>

    <input type="submit" name="submit" value="Sauvegarder">
</form>
