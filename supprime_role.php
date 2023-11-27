<?php
include 'Database.php';
 $id = $_GET["id"];
 $sql = "DELETE from roles  where id_role = $id ";
 $con  = new Database();
 $con->getConnection()->query($sql);
 header("Location: list_role.php");


 ?>
