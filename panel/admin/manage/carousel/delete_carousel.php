<?php
require "../../../../database/database.php";
require "../../check_admin.php";

$carouselImageId = $_GET['id'];

$q = "DELETE FROM carousel WHERE id = :id";
$pre = $conn->prepare($q);
$pre->bindParam('id', $carouselImageId);
$pre->execute();

header("Location: manage_carousel.php");