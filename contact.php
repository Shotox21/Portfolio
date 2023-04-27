<?php

$formUsername = $_POST['username'];
$formEmail = $_POST['email'];
$formMessage = $_POST['message'];

require_once "database/database.php";
$cleanUsername = sanitize($formUsername);
$cleanEmail = sanitize($formEmail);
$cleanMessage = sanitize($formMessage);

$q = "INSERT INTO contact_form(username,email,message) VALUES(:username,:email,:message)";
$pre = $conn->prepare($q);

$pre->bindParam("username", $cleanUsername);
$pre->bindParam("email", $cleanEmail);
$pre->bindParam("message", $cleanMessage);
$pre->execute();

$to = "curralclement@gmail.com";
$subject = $cleanUsername." - Mail du site";

mail($to, $subject, $cleanMessage, null, null);

$_SESSION['success'] = "Mail envoyé!";

header('Location:index.php');

function sanitize(string $var): string {
    return htmlspecialchars($var, ENT_QUOTES, 'UTF-8');
}