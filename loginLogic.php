<?php
session_start();

// Connection with database
include_once("config.php");

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if fields are empty
    if (empty($email) || empty($password)) {
        echo "Please fill all the fields";
        header("refresh:4; url=login.php");
        exit;
    } else {
        // Fetch user data from the database
        $sql = "SELECT * FROM users WHERE email=:email";
        $selectUser = $connect->prepare($sql);
        $selectUser->bindParam(":email", $email);
        $selectUser->execute();

        if ($selectUser->rowCount() > 0) {
            // Fetch user data
            $userData = $selectUser->fetch(PDO::FETCH_ASSOC);

            // Verify the password
            if (password_verify($password, $userData['password'])) {
                // Save user data in the session
                $_SESSION['user_id'] = $userData['id'];
                $_SESSION['username'] = $userData['username'];
                $_SESSION['role'] = $userData['role'];

                // Redirect based on the user's role
                if ($_SESSION['role'] === 'admin') {
                    header("Location: dashboard.php");
                } else {
                    header("Location: index.php");
                }
                exit;
            } else {
                echo "Incorrect password. Please try again.";
                header("refresh:4; url=login.php");
                exit;
            }
        } else {
            echo "User not found. Please check your email.";
            header("refresh:4; url=login.php");
            exit;
        }
    }
}
?>
