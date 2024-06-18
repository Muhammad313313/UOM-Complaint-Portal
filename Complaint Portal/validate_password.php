<?php include('includes/config.php');?>
<?php
// validate_password.php

// Assuming you have a database connection established

// Retrieve the old password from the database
$userId = $_SESSION['userid'];
$checkPasswordQuery = "SELECT password FROM registrations WHERE Enroll_ID = '$userId'";
$checkPasswordResult = $mysqli->query($checkPasswordQuery);
$userData = $checkPasswordResult->fetch_assoc();
$storedPassword = $userData['password'];

// Compare the old password with the provided old password
$oldPassword = $_POST['oldPassword'];
if (password_verify($oldPassword, $storedPassword)) {
    // Old password is valid
    echo "valid";
} else {
    // Old password is invalid
    echo "invalid";
}
?>
