<?php
require "../../database/database.php";
require "check_admin.php";?>

<link rel="stylesheet" href="../../fonts/icons/material-icons.css">
<link rel="stylesheet" href="../../css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<link rel="stylesheet" href="../../css/materialize.min.css">
<link rel="shortcut icon" href="../../img/favicon/favicon.png">

<?php
$sql = "SELECT * FROM contact_form";
$pre = $conn->prepare($sql);
$pre->execute();
$data = $pre->fetchAll(PDO::FETCH_ASSOC);

echo "<table>";
echo "<tr>";
echo "<th></th>";
echo "<th>username</th>";
echo "<th>email</th>";
echo "<th>message</th>";

foreach ($data as $contact_form) {
    echo "<tr>";
    echo "<td></td>";
    echo "<td>".$contact_form['username']."</td>";
    echo "<td>".$contact_form['email']."</td>";
    echo "<td>".$contact_form['message']."</td>";
}?>
<h2><a class="waves-effect waves-light btn" href="../../index.php">Revenir à l'accueil</a></h2>
