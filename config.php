<?php

$username = "root";
$password = "";
$host = "localhost";
$dbname = "gpt_store";


try{

    $connect = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {

    echo $e->getMessage();
}
?>