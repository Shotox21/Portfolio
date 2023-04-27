<?php

require "../../../database/database.php";
require "../check_admin.php";?>

  <link rel="stylesheet" href="../../../fonts/icons/material-icons.css">
    <link rel="stylesheet" href="../../../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="../../../css/materialize.min.css">
    <link rel="shortcut icon" href="../../../img/favicon/favicon.png">
<?php
$sql = "SELECT * FROM users";
$pre = $conn->prepare($sql);
$pre->execute();
$data = $pre->fetchAll(PDO::FETCH_ASSOC);

echo "<table>";
echo "<tr>";
echo "<th></th>";
echo "<th>ID</th>";
echo "<th>Utilisateur</th>";
echo "<th>Admin</th>";
echo "<th>Modifier</th>";
echo "<th>Supprimer le compte</th>";
echo "</tr>";
foreach ($data as $user) {
    echo "<tr>";
    echo "<td></td>";
    echo "<td>".$user['id']."</td>";
    echo "<td>".$user['username']."</td>";
    echo $user['admin'] == 0
        ? "<td>Non</td>"
        : "<td>Oui</td>";
    echo $user['admin'] == 0
        ? "<td><a class='waves-effect waves-light btn' href='../rights/change_users_rights.php?id=".$user['id']."'>Passer en Administrateur</a></td>"
        : "<td><a class='waves-effect waves-light btn' href='../rights/change_users_rights.php?id=".$user['id']."'>Passer en Utilisateur</a></td>";
    echo "<td><a class='waves-effect waves-light btn' href='../rights/delete_account.php?id=".$user['id']."'>X</a></td>";
    echo "</tr>";
}

echo "</table>"; ?>

<script src="js/materialize.min.js"></script>