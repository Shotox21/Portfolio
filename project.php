<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charSet="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Page responsive pour présenter les différents projets réalisés">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="fonts/icons/material-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon/favicon.png">
    <title class="teko">Guardia - Projet d'Algorithmie</title>
</head>
<body id="prj_pge">
    <?php
    require "database/database.php";
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
    $titleImage = $data['title_image'];
    $descriptionImage = $data['description_image'];

    if(empty($name) || empty($acquiredSkills) || empty($title) || empty($description) || empty($titleImage) || empty($descriptionImage)) {
        header("Location: index.php");
        exit();
    }
    ?>
<header>
    <?php
    include 'navbar.php';
    ?>
</header>
    <div id="mn_cnt">
        <h1 class="white-text align teko animate__animated animate__bounceInLeft"><?php echo $name ?></h1>
            <div class="container">
                <div class="grey-text text-darken-3 project-title align teko padding-top padding-bot">
                    <h2>Présentation du projet</h2>
                    <p class="spiegel justify"><?php echo $description?></p>
                </div>
                <div class="card">
                    <div class="card_image" style="background-image: url(<?php echo $titleImage?>);"></div>
                    <div class="card-content brown-background-colour z-depth-5">
                        <span class="card-title align padding-bot-top-cards white-text">COMPETENCES ACQUISES</span>
                        <p class="spiegel align white-text">
                            <?php
                            $split = explode(",", $acquiredSkills);
                            foreach ($split as $skill) {
                                echo $skill . "<br>";
                            }
                            ?>
                        </p>
                    </div>
                </div>
                <img class="responsive-img project-image-pages z-depth-5" src="<?php echo $descriptionImage ?>" alt="image du projet">
                <a href="index.php" class="btn-large waves-effect waves-light">Retour</a>
        </div>
    </div>
    <?php include 'footer.php' ?>
</body>
</html>

