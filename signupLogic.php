<?php

include_once("config.php");

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $tempPassword = $_POST['password'];
    $password = password_hash($tempPassword, PASSWORD_DEFAULT);
    $defaultRole = 'user'; 

    if (empty($username) || empty($email) || empty($password)) {
        echo "You need to fill all the fields";
    } else {
  
        $sql = "SELECT username FROM users WHERE username=:username";
        $sqlCheckUsernames = $connect->prepare($sql);
        $sqlCheckUsernames->bindParam(':username', $username);
        $sqlCheckUsernames->execute();
        if ($sqlCheckUsernames->rowCount() > 0) {
            header("refresh:2; url=username.php");
        } else {

            $sql = "INSERT INTO users(username, email, password, role) VALUES (:username, :email, :password, :role)";
            $sqlPrep = $connect->prepare($sql);
            $sqlPrep->bindParam(':username', $username);
            $sqlPrep->bindParam(':email', $email);
            $sqlPrep->bindParam(':password', $password);
            $sqlPrep->bindParam(':role', $defaultRole);
            $sqlPrep->execute();

           

            header("Location: login.php");
        }
    }
}

?>
