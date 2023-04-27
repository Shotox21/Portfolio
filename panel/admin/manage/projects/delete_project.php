<?php
require "../../../../database/database.php";
require "../../check_admin.php";

$projectId = $_GET['id'];

$q = "DELETE FROM projects WHERE id = :id";
$pre = $conn->prepare($q);
$pre->bindParam('id', $projectId);
$pre->execute();

header("Location: manage_projects.php");
