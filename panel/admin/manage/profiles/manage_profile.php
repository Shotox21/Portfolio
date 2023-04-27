<?php
require "../../../../database/database.php";
require "../../check_admin.php";
?>

    <link rel="stylesheet" href="../../../../fonts/icons/material-icons.css">
    <link rel="stylesheet" href="../../../../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="../../../../css/materialize.min.css">
    <link rel="shortcut icon" href="../../../../img/favicon/favicon.png">

<?php
$sql = "SELECT * FROM students WHERE ID = :id";
$pre = $conn->prepare($sql);
$pre->bindParam('id', $_GET['id']);
$pre->execute();
$data = $pre->fetch(PDO::FETCH_ASSOC);

$name = $data['name'];
$description = $data['description'];
$linkedin = $data['linkedin'];
?>

    <form method="post" action="change_profiles.php?id=<?php echo $data['id']?>" enctype="multipart/form-data">
        <label for="name">Nom de l'étudiant:</label><br>
        <input type="text" name="name" value="<?php echo $name ?>"><br>
        <label for="description">Description de l'étudiant:</label><br>
        <input type="text" name="description" value="<?php echo $description ?>"><br>
        <label for="linkedin">Lien linkedin:</label><br>
        <input type="text" name="linkedin" value="<?php echo $linkedin ?>"><br>
        <label for="image">Image de l'Étudiant:</label><br>
        <input type="file" name="image" value="image"><br><br>
        <input type="submit" name="submit" value="Sauvegarder">
    </form>
<?php
