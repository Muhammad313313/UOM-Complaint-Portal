<?php
// Include database mysqli
require 'includes/config.php';

// Check if email is provided in the URL
if (!isset($_GET['email'])) {
    header('Location: forgot_password.php'); // Redirect if email is not provided
    exit();
}

// Get the email from the URL
$email = $_GET['email'];

// Function to update password
function updatePassword($email, $password) {
    global $mysqli;
    // Hash the password
    $hashed_password = $password;
    // Update the password in the database
    $query = "UPDATE registrations SET Password = '$hashed_password' WHERE Email_Address = '$email'";
    return mysqli_query($mysqli, $query);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get new password from form submission
    $new_password = $_POST['password'];
    // Update password in the database
    if (updatePassword($email, $new_password)) {
        // Password updated successfully
        $success_message = 'Password reset successful. You can now <a href="index.php">login</a> with your new password.';
    } else {
        // Error updating password
        $error_message = 'Error: Failed to reset password.';
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f4f4f4;
  background-image: url('./Images/BgImage.jpg');
  background-size: cover; /* Adjust as needed */
  background-position: center; /* Adjust as needed */
  background-color: rgba(255, 255, 255, 0.5); /* White background with 50% opacity */

}

.container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100vh;
  max-width: 400px;
  margin: 100px auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0,0,0,0.1);
  opacity: 0.9;
}

img {
  margin-bottom: 20px; /* Optional: Add space below the image */
}

h1 {
  text-align: center;
  margin-bottom: 20px;
}



label,
input,
button,
.options {
  display: block;
  width: 100%;
  margin-bottom: 10px;
}

input[type="text"],
input[type="password"] {
  padding: 8px;
  border-radius: 3px;
  border: 1px solid #ccc;
  width: 300px;
}

button {
  padding: 10px;
  background-color: #007bff;
  color: #fff;
  border: none;
  width: 120px;
  border-radius: px;
  cursor: pointer;
  
}

button:hover {
  background-color: #0056b3;
}

.options a {
  text-decoration: none;
  color: #007bff;
  font-size: 14px;
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-bottom: 10px; 
}

.options a:hover {
  text-decoration: underline;
}



    </style>
  </head>

  <body>

    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->


    <div class="container">
    <img src="./Images/logo.jpg" alt="" width="82px" height="70px">
        <h6>Reset Password</h6>
        <BR>
    <?php
    if (isset($success_message)) {
        echo '<p>' . $success_message . '</p>';
    } else {
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?email=' . $email; ?>">
            <label for="password">New Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>
            <input type="submit" value="Reset Password">
        </form>
        <?php
        if (isset($error_message)) {
            echo '<p>' . $error_message . '</p>';
        }
    }
    ?>

      </div>


  </body>
</html>
