<?php
    require_once "database/database.php";
    $q = "SELECT * FROM home";
    $pre = $conn->prepare($q);
    $pre->execute();
    $data = $pre->fetch(PDO::FETCH_ASSOC);
    $title = $data['title'];
    $subtitle = $data['subtitle'];
    $carouselTitle = $data['carousel'];
    $teamTitle = $data['team'];
    $parallaxImage = $data['parallax_image'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charSet="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portfolio responsive pour me présenter et présenter les différents projets réalisés">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="shortcut icon" href="img/favicon/favicon.png">
    <title>Portfolio</title>
</head>
<body>
<header>
    <?php
    include 'navbar.php';
    include 'handle_messages.php';
    ?>
</header>
<div id="intro">
    <h1 id="intro_ttle" ><?php echo $title ?></h1>
    <h2 id="intro_sub"><?php echo $subtitle ?></h2>
</div>
<div id="gallery">
    <?php
        $sql = "SELECT * FROM carousel";
        $pre = $conn->prepare($sql);
        $pre->execute();
        $data = $pre->fetchAll(PDO::FETCH_ASSOC);
        foreach($data as $image) {
            ?>
            <div class="carousel-item" style="background-image: url(<?php echo $image['path']?>);"></div>
            <?php
        }
    ?>
</div>
<div id="prjs">
    <div id="ttle_cnt">
        <h2>
            .Projets
        </h2>
    </div>
    <div id="prj_cards">
            <?php
            $q = "SELECT * FROM projects";
            $pre = $conn->prepare($q);
            $pre->execute();
            $projects = $pre->fetchAll(PDO::FETCH_ASSOC);

            foreach($projects as $project) {
                ?>
                <a href="project.php?id=<?php echo $project['id'] ?>" class="card" alt="<?php echo $project['card_image_title']?>">
                    <div style="background-image: url(<?php echo $project['card_image']?>);" class="card_image"></div>
                    <p class="prj_ttle"><?php echo $project['card_image_description']?></p>
                </a>
            <?php } ?>
    </div>
</div>
<div id="me">
    <?php
    $q = "SELECT * FROM students";
    $pre = $conn->prepare($q);
    $pre->execute();
    $students = $pre->fetchAll(PDO::FETCH_ASSOC);
    foreach($students as $student) { ?>
        <div class="card">
            <div class="sub_crd">
                <div id="card_image"></div>
                <p class="card-title align padding-bot-top-cards"><?php echo $student['name'] ?></p>
                <p class="spiegel align"><?php echo $student['description'] ?></p>
                <a class="waves-effect waves-light btn" href="cv.php">Mon cv</a>
            </div>
        </div>
        <div>
            <p class="black-text">Je suis Clément Curral,
                Actuellement en première année à Guardia Cybersecurity School dans l'objectif d'obtenir un master of science expert cybersécurité.
                J'ai toujours été passionné par l'informatique et la sécurité informatique, j'ai donc décidé de me lancer dans cette formation.
                J'aime beaucoup le développement web, la cybersécurité et la programmation.
                De plus, j'aime beaucoup les nouvelles technologies et je suis toujours à la recherche de nouvelles choses à apprendre.
                Pour plus d'information me concernant je vous invite à consulter mon CV.
            </p>
        </div>
    <?php }?>
</div>
<?php include 'footer.php' ?>
<!-- Compiled and minified JavaScript -->
<script src="https://rawgit.com/WeiChiaChang/Easter-egg/master/easter-eggs-collection.js"></script>
<script src="js/scripts.js"></script>
<script src="js/easter-egg.js"></script>
</body>
</html>