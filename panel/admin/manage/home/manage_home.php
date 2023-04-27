<?php
    require "../../../../database/database.php";
    require "../../check_admin.php";?>

    <link rel="stylesheet" href="../../../../fonts/icons/material-icons.css">
    <link rel="stylesheet" href="../../../../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="../../../../css/materialize.min.css">
    <link rel="shortcut icon" href="../../../../img/favicon/favicon.png">

    <?php
    $sql = "SELECT * FROM home";
    $pre = $conn->prepare($sql);
    $pre->execute();
    $data = $pre->fetch(PDO::FETCH_ASSOC);

    $title = $data['title'];
    $subtitle = $data['subtitle'];
    $carouselTitle = $data['carousel'];
    $teamTitle = $data['team'];?>


<form method="post" action="change_home.php" enctype="multipart/form-data">
    <label for="title">Titre de la page:</label><br>
    <input type="text" name="title" value="<?php echo $title ?>"><br>
    <label for="subtitle">Sous-titre:</label><br>
    <input type="text" name="subtitle" value="<?php echo $subtitle ?>"><br><br>
    <label for="carousel-title">Titre du Carousel:</label><br>
    <input type="text" name="carousel-title" value="<?php echo $carouselTitle ?>"><br>
    <label for="parallax_image">Image du Parallax:</label><br>
    <input type="file" name="parallax_image" value="parallax_image"><br><br>
    <label for="team-title">Titre pour l'équipe:</label><br>
    <input type="text" name="team-title" value="<?php echo $teamTitle ?>"><br>
    <input type="submit" name="submit" value="Sauvegarder">
</form>
