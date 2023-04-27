<link rel="stylesheet" href="../../../../fonts/icons/material-icons.css">
<link rel="stylesheet" href="../../../../css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<link rel="stylesheet" href="../../../../css/materialize.min.css">
<link rel="shortcut icon" href="../../../../img/favicon/favicon.png">

<?php
require "../../../../database/database.php";
require "../../check_admin.php";

$sql = "SELECT * FROM students";
$pre = $conn->prepare($sql);
$pre->execute();
$data = $pre->fetchAll(PDO::FETCH_ASSOC);

echo "<table>";
echo "<tr>";
echo "<th></th>";
echo "<th>ID</th>";
echo "<th>Nom</th>";
echo "<th>Modifier</th>";
echo "</tr>";

foreach ($data as $student) {
    echo "<tr>";
    echo "<td></td>";
    echo "<td>" . $student['id'] . "</td>";
    echo "<td>" . $student['name'] . "</td>";
    echo "<td><a class='waves-effect waves-light btn' href='manage_profile.php?id=".$student['id']."'>Modifier le profil étudiant</a></td>";
    echo "</tr>";
}
echo "</table>";