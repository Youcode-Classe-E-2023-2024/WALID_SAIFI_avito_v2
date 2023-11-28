<?php
require_once "Database.php"; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $con = new Database();
    $titre = $_POST["titre"];
    $description = $_POST["description"];
    $prix = $_POST["prix"];
    $telephone = $_POST["telephone"];
    $email = $_POST["email"];

    $sql = "UPDATE annonces SET titre='$titre', description='$description', prix=$prix, telephone='$telephone', email='$email' WHERE id_annonce=$id";
    $con->getConnection()->query($sql);

    header("Location: annonseur.php");
}

?>
