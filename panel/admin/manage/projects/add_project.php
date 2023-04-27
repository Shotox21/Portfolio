<?php
require "../../../../database/database.php";
require "../../check_admin.php";?>
    <link rel="stylesheet" href="../../../../fonts/icons/material-icons.css">
    <link rel="stylesheet" href="../../../../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="../../../../css/materialize.min.css">
    <link rel="shortcut icon" href="../../../../img/favicon/favicon.png">

    <form method="post" action="create_project.php" enctype="multipart/form-data">
        <label for="name">Nom du projet:</label><br>
        <input type="text" name="name"><br>

        <label for="acquired_skills">Skills obtenus: (séparés par une virgule)</label><br>
        <input type="text" name="acquired_skills""><br>

        <label for="title">Titre du projet:</label><br>
        <input type="text" name="title"><br>

        <label for="description">Description du projet:</label><br>
        <textarea name="description" rows="10" cols="50"></textarea><br>

        <label for="title_image">Upload l'image principale:</label><br>
        <input type="file" name="title_image"><br>

        <label for="description_image">Upload l'image secondaire:</label><br>
        <input type="file" name="description_image"><br>

        <label for="card_image_title">Titre de la carte:</label><br>
        <input type="text" name="card_image_title"><br>

        <label for="card_image_description">Description de la carte:</label><br>
        <textarea name="card_image_description" rows="10" cols="50"></textarea><br>

        <label for="card_image">Image de la carte:</label><br>
        <input type="file" name="card_image"><br>

        <label for="card_image_icon">Icon du bouton</label><br>
        <input type="text" name="card_image_icon"><br>

        <label for="card_image_color">Couleur du bouton de l'image:</label><br>
        <input type="text" name="card_image_color"><br>

        <input type="submit" name="submit" value="Sauvegarder">
    </form>

<?php
