<?php
require "../../../../database/database.php";
require "../../check_admin.php";

$q = "INSERT INTO carousel(alt, path) VALUES (:alt, :path)";

$alt = $_POST['image_alt'];
$pre = $conn->prepare($q);

$target_dir = "../../../../img/carousel/";
$target_file = $target_dir . $_FILES["carousel_image"]["name"];
$uploadOk = false;

$allowedExtensions = ['png', 'jpeg', 'jpg', 'gif', 'webp'];

if (isset($_POST["submit"])) {
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
    move_uploaded_file($_FILES["carousel_image"]["tmp_name"], $target_file);

    $pre->bindParam("alt", $alt);
    $pre->bindParam("path", $target_file);

    $pre->execute();
}

header("Location: ../../../../index.php");


function checkFileExtension($target_file, $allowedExtensions): bool
{
    $fileExtension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    return in_array($fileExtension, $allowedExtensions);
}
