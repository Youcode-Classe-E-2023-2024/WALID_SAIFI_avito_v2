<?php
require_once "Database.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $role=$_POST['role'];
    switch ($role) {
        case 'admin':
            $id_choix=1;
            break;
        case 'annonceur':
            $id_choix=2;
            break;
        case 'client':
            $id_choix=3;
            break;
        default:
            $id_choix=0;
            break;
    }
    $conn = new Database();
    $sql = "UPDATE users SET username='$username', password='$password', id_role='$id_choix', nom='$nom', prenom='$prenom' WHERE user_id='$id'";
    $conn->getConnection()->query($sql);
    header("Location: list_user.php");
}
?>