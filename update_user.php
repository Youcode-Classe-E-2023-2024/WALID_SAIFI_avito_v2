<?php
require_once "Database.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id_role = $_POST['id_role'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $conn = new Database();
    $sql = "UPDATE users SET username='$username', password='$password', id_role='$id_role', nom='$nom', prenom='$prenom' WHERE user_id='$id'";
    $conn->getConnection()->query($sql);
    header("Location: list_user.php");
}
?>