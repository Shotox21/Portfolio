<?php
    if ($_SESSION['admin'] == 0) {
        header('Location: ../../../index.php');
        exit();
    }