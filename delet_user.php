<?php
require_once 'Database.php';

$id = $_GET["id"];
$sql = "DELETE FROM users WHERE user_id = $id"; // Use the correct column name
$conn = new Database();
$conn->getConnection()->query($sql);

// Check for errors in the query execution
if ($conn->getConnection()->error) {
    echo "Error deleting user: " . $conn->getConnection()->error;
} else {
    header("Location: list_user.php");
}

$conn->getConnection()->close();
?>
