<?php
require_once 'Database.php';

$id = $_GET["id"];
$sql = "DELETE FROM users WHERE user_id = $id"; 
$conn = new Database();
$conn->getConnection()->query($sql);

if ($conn->getConnection()->error) {
    echo "Error deleting user: " . $conn->getConnection()->error;
} else {
    header("Location: list_user.php");
}

$conn->getConnection()->close();
?>
