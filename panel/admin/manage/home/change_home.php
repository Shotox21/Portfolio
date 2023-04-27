<?php
    require "../../../../database/database.php";
    require "../../check_admin.php";

    $formTitle = $_POST['title'];
    $formSubtitle = $_POST['subtitle'];
    $formCarousel = $_POST['carousel-title'];
    $formTeam = $_POST['team-title'];

    $q = "UPDATE home SET title=:title, subtitle=:subtitle, carousel=:carousel, parallax_image=:parallax_image, team=:team";
    $pre = $conn->prepare($q);

    $target_dir = "../../../../img/parallax/";
    $target_file = $target_dir . $_FILES["parallax_image"]["name"];
    $uploadOk = false;

    $allowedExtensions = ['png', 'jpeg', 'jpg', 'gif', 'webp'];

    if(isset($_POST["submit"])) {
        if ($_FILES["parallax_image"]["size"] > 100000000) {
            echo "Désolé, votre fichier est trop volumineux.";
            exit();
        }
        $uploadOk = (checkFileExtension($target_file, $allowedExtensions));
    }

    if (!$uploadOk) {
        echo "Désolé, votre fichier n'a pas été upload.";
        exit();
    } else {
        move_uploaded_file($_FILES["parallax_image"]["tmp_name"], $target_file);

        $pre->bindParam("title", $formTitle);
        $pre->bindParam("subtitle", $formSubtitle);
        $pre->bindParam("carousel", $formCarousel);
        $pre->bindParam("parallax_image", $target_file);
        $pre->bindParam("team", $formTeam);
        $pre->execute();
    }

    header("Location: ../../../../index.php");


function checkFileExtension($target_file, $allowedExtensions) : bool {
    $fileExtension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    return in_array($fileExtension, $allowedExtensions);
}