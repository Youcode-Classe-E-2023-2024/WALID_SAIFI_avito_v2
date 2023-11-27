<?php
require_once "Database.php"; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id=$_POST['id_role'];
    $conn = new Database();
    $newRole = $_POST['role'];
    $sql = "UPDATE roles SET role = '$newRole' WHERE id_role = $id";
    $conn->getConnection()->query($sql);

    header("Location: list_role.php");

}
?>