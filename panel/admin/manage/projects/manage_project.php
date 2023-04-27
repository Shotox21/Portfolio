<?php
    require "../../../../database/database.php";
    require "../../check_admin.php";?>
<link rel="stylesheet" href="../../../../fonts/icons/material-icons.css">
<link rel="stylesheet" href="../../../../css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<link rel="stylesheet" href="../../../../css/materialize.min.css">
<link rel="shortcut icon" href="../../../../img/favicon/favicon.png">
<?php

$projectId = $_GET['id'];

$q = "SELECT * FROM projects WHERE id = :id";
$pre = $conn->prepare($q);
$pre->bindParam('id', $projectId);
$pre->execute();
$data = $pre->fetch(PDO::FETCH_ASSOC);

$name = $data['name'];
$acquiredSkills = $data['acquired_skills'];
$title = $data['title'];
$description = $data['description'];
$cardImageTitle = $data['card_image_title'];
$cardImageDescription = $data['card_image_description'];
$cardImagePath = $data['card_image'];
$cardImageIcon = $data['card_image_icon'];
$cardImageColor = $data['card_image_color'];
$action = "change_project.php?id=".$data['id'];
?>

<form method="post" action="<?php echo $action ?>" enctype="multipart/form-data">
    <label for="name">Nom du projet:</label><br>
    <input type="text" name="name" value="<?php echo $name ?>"><br>

    <label for="acquired_skills">Skills obtenus: (séparés par une virgule)</label><br>
    <input type="text" name="acquired_skills" value="<?php echo $acquiredSkills ?>"><br>

    <label for="title">Titre du projet:</label><br>
    <input type="text" name="title" value="<?php echo $title ?>"><br>

    <label for="description">Description du projet:</label><br>
    <textarea name="description" rows="10" cols="50"><?php echo $description ?></textarea><br>

    <label for="title_image">Upload l'image principale:</label><br>
    <input type="file" name="title_image" value="main_image"><br>

    <label for="description_image">Upload l'image secondaire:</label><br>
    <input type="file" name="description_image" value="second_image"><br>

    <label for="card_image_title">Titre de la carte:</label><br>
    <input type="text" name="card_image_title" value="<?php echo $cardImageTitle ?>"><br>

    <label for="card_image_description">Description de la carte:</label><br>
    <input type="text" name="card_image_description" value="<?php echo $cardImageDescription ?>"><br>

    <label for="card_image">Image de la carte:</label><br>
    <input type="file" name="card_image" value="card_image"><br>

    <label for="card_image_icon">Icon du bouton</label><br>
    <input type="text" name="card_image_icon" value="<?php echo $cardImageIcon ?>"><br>

    <label for="card_image_color">Couleur du bouton de l'image:</label><br>
    <input type="text" name="card_image_color" value="<?php echo $cardImageColor ?>"><br>

    <input type="submit" name="submit" value="Sauvegarder">
</form>

