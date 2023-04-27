<?php
require "../../../../database/database.php";
require "../../check_admin.php";

$name = $_POST['name'];
$description = $_POST['description'];
$linkedin = $_POST['linkedin'];
$id = $_GET['id'];

$q = "UPDATE students SET name=:name, description=:description, linkedin=:linkedin, image=:image WHERE id=:id";
$pre = $conn->prepare($q);

$target_dir = "../../../../img/students/";
$target_file = $target_dir . $_FILES["image"]["name"];
$uploadOk = false;

$allowedExtensions = ['png', 'jpeg', 'jpg', 'gif', 'webp'];

if(isset($_POST["submit"])) {
    if ($_FILES["image"]["size"] > 100000000) {
        echo "Désolé, votre fichier est trop volumineux.";
        exit();
    }
    $uploadOk = (checkFileExtension($target_file, $allowedExtensions));
}

if (!$uploadOk) {
    echo "Désolé, votre fichier n'a pas été upload.";
    exit();
} else {
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $pre->bindParam("name", $name);
    $pre->bindParam("description", $description);
    $pre->bindParam("linkedin", $linkedin);
    $pre->bindParam("image", $target_file);
    $pre->bindParam("id", $id);
    $pre->execute();
}

header("Location: ../../../../index.php");

function checkFileExtension($target_file, $allowedExtensions) : bool {
    $fileExtension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    return in_array($fileExtension, $allowedExtensions);
}