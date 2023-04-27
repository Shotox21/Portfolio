<?php
    session_start();

    $serverName = "localhost";
    $dbName = "Big_Project";
    $dbUser = "root";
    $password = "root";

    try {
        $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $dbUser, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    ?>