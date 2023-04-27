<?php
$formUsername = $_POST['username'];
$cleanUsername = htmlspecialchars($formUsername, ENT_QUOTES, 'UTF-8');

$formPassword = $_POST['password'];


require "../../database/database.php";

$q = "SELECT * FROM users WHERE username = :username";
$pre = $conn->prepare($q);
$pre->bindParam('username', $cleanUsername);
$pre->execute();
$user = $pre->fetch(PDO::FETCH_ASSOC);

if(password_verify($formPassword, $user['password'])) {
    create_session($user, $cleanUsername);
} else {
    $_SESSION['error'] = "Mot de passe incorrect";
}
header("Location: ../../index.php");

function create_session($user, $cleanUsername): void
{
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $cleanUsername;
    $_SESSION['email'] = $user['email'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['error'] = "";
    $_SESSION['success'] = "Vous êtes connecté!";
}