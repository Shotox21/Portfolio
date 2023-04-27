<?php
require "../../../database/database.php";
require "../check_admin.php";

$userId = $_GET['id'];

$q = "DELETE FROM users WHERE id = :id";
$pre = $conn->prepare($q);
$pre->bindParam('id', $userId);
$pre->execute();

header("Location: ../manage/manage_users.php");