<?php

require_once 'Database.php';

$id = $_GET["id"];
$sql = "DELETE FROM annonces WHERE id_annonce = $id";
$con = new Database();
$con->getConnection()->query($sql);
if($_SESSION['role'] == 'annonceur'){
    header("Location: annonseur.php");
}else{
   header("Location: admin.php");
}


?>
