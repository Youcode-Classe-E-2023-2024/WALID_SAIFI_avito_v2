<?php

require_once 'Database.php';

$id = $_GET["id"];
$sql = "DELETE FROM annonces WHERE id_annonce = $id";
$con = new Database();
$con->getConnection()->query($sql);
header("Location: annonseur.php");
?>
