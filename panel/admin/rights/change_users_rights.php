<?php
include "../../../database/database.php";
include "../check_admin.php";

$userId = $_GET['id'];

$q = "UPDATE users SET admin=IF(admin=1,0,1) WHERE id = :id";
$pre = $conn->prepare($q);
$pre->bindParam('id', $userId);
$pre->execute();

header("Location: manage_users.php");
