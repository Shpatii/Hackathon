<?php 

 // connection with database
 include_once("config.php");

 $id = $_GET['id'];

 $sql = "DELETE FROM users WHERE id = :id";

 $sqlPrep = $connect->prepare($sql);

 $sqlPrep->bindParam(':id', $id);

 $sqlPrep->execute();

 header("Location: dashboard.php");


?>