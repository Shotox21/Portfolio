<?php
    $formUsername = $_POST['username'];
    $formPassword = $_POST['password'];
    $formEmail = $_POST['email'];

    require "../../database/database.php";

    $q = "SELECT * FROM users";
    $pre = $conn->prepare($q);
    $pre->execute();
    $data = $pre->fetchAll(PDO::FETCH_ASSOC);

    $already_in_use = false;

    $cleanUsername = sanitize($formUsername);
    $cleanEmail = sanitize($formEmail);

    foreach($data as $user) {
        if ($cleanUsername == $user['username'] || $cleanEmail == $user['email']) {
            echo "Email ou nom d'utilisateur déjà utilisé";
            $already_in_use = true;
        }
    }

    if(!$already_in_use) {
        $q = "INSERT INTO users(username,password,email) VALUES(:username,:password,:email)";
        $pre = $conn->prepare($q);

        $formPassword = password_hash($formPassword, PASSWORD_ARGON2ID);

        $pre->bindParam("username", $cleanUsername);
        $pre->bindParam("password", $formPassword);
        $pre->bindParam("email", $cleanEmail);
        $pre->execute();

        header('Location:../../index.php');
    }
    function sanitize(string $var): string {
        return htmlspecialchars($var, ENT_QUOTES, 'UTF-8');
    }