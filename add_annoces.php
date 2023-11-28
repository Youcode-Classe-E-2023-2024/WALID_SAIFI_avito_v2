<?php
session_start();

require_once("Database.php");
$conn = new Database();
$titre = $_POST['titre'];
$description = $_POST['description'];
$prix = $_POST['prix'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];
$id_user=$_SESSION['id'];
$insertSql = "INSERT INTO annonces (titre, description, prix, telephone, email, id_user) VALUES ('$titre', '$description','$prix','$telephone','$email','$id_user')";
if ($conn->getConnection()->query($insertSql) === TRUE) {
    header("Location:annonseur.php");
}


?>
