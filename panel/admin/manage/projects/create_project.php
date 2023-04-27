<?php

require "../../../../database/database.php";
require "../../check_admin.php";

$formName = $_POST['name'];
$formAcquiredSkills = $_POST['acquired_skills'];
$formTitle = $_POST['title'];
$formDescription = $_POST['description'];
$formCardImageTitle = $_POST['card_image_title'];
$formCardImageDescription = $_POST['card_image_description'];
$formCardImageIcon = $_POST['card_image_icon'];
$formCardImageColor = $_POST['card_image_color'];

$q = "INSERT INTO projects (
                      name, 
                      acquired_skills, 
                      title, 
                      description, 
                      title_image, 
                      description_image, 
                      card_image, 
                      card_image_title, 
                      card_image_description, 
                      card_image_icon, 
                      card_image_color) VALUES (
                                                :name, 
                                                :acquired_skills, 
                                                :title, 
                                                :description, 
                                                :title_image, 
                                                :description_image, 
                                                :card_image, 
                                                :card_image_title, 
                                                :card_image_description, 
                                                :card_image_icon, 
                                                :card_image_color)";


$stmt = $conn->query("SELECT id FROM projects ORDER BY id DESC LIMIT 1");
$result = $stmt->fetch();
$projectId = $result['id'] + 1;

$pre = $conn->prepare($q);

$images = ["title_image", "description_image", "card_image"];

$target_dir = "../../../../img/projects/".$projectId."/";
if(!is_dir($target_dir)) {
    mkdir($target_dir);
}

foreach ($images as $image) {
    $target_file = $target_dir . $_FILES[$image]["name"];
    $pre = checkFile($image, $target_file, $pre);
    move_uploaded_file($_FILES[$image]["tmp_name"], $target_file);
}

$pre->bindParam("name", $formName);
$pre->bindParam("acquired_skills", $formAcquiredSkills);
$pre->bindParam("title", $formTitle);
$pre->bindParam("description", $formDescription);
$pre->bindParam("card_image_title", $formCardImageTitle);
$pre->bindParam("card_image_description", $formCardImageDescription);
$pre->bindParam("card_image_icon", $formCardImageIcon);
$pre->bindParam("card_image_color", $formCardImageColor);
$pre->execute();

header('Location: ../../../../index.php');

function checkFileExtension($target_file, $allowedExtensions): bool
{
    $fileExtension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    return in_array($fileExtension, $allowedExtensions);
}

function checkFile($name, $target_file, $pre) {
    $allowedExtensions = ['png', 'jpeg', 'jpg', 'gif', 'webp'];
    if (isset($_POST["submit"])) {
        if ($_FILES[$name]["size"] > 1000000000) {
            echo "Désolé, votre fichier est trop volumineux.";
            exit();
        }
        if(!checkFileExtension($target_file, $allowedExtensions)){
            $_SESSION['error'] = "Désolé, votre fichier n'a pas été upload (vérifiez qu'il y ait bien toutes les images).";
            if(is_dir($target_dir)) {
                rmdir($target_dir);
            }
            header("Location: add_project.php");
            exit();
        }else{
            $pre->bindParam($name, $target_file);
            return $pre;
        }
    }
}