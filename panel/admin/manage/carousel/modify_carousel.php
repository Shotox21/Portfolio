<link rel="stylesheet" href="../../../../fonts/icons/material-icons.css">
<link rel="stylesheet" href="../../../../css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<link rel="stylesheet" href="../../../../css/materialize.min.css">
<link rel="shortcut icon" href="../../../../img/favicon/favicon.png">

<?php
require "../../../../database/database.php";
require "../../check_admin.php";

$sql = "SELECT * FROM carousel";
$pre = $conn->prepare($sql);
$pre->execute();
$data = $pre->fetchAll(PDO::FETCH_ASSOC);

echo "<table>";
echo "<tr>";
echo "<th></th>";
echo "<th>ID</th>";
echo "<th>ALT</th>";
echo "<th>Supprimer</th>";
echo "</tr>";
foreach ($data as $carousel) {
    echo "<tr>";
    echo "<td></td>";
    echo "<td>" . $carousel['id'] . "</td>";
    echo "<td>" . $carousel['alt'] . "</td>";
    echo "<td><a class='waves-effect waves-light btn' href='delete_carousel.php?id=".$carousel['id']."'>X</a></td>";
    echo "</tr>";
}
echo "</table>";