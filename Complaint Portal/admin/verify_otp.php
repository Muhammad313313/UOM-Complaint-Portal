<?php

// Include database mysqli
require '../includes/config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user's email and OTP from form submission
    $email = $_POST['email'];
    $otp = $_POST['otp'];

    // Check if OTP matches the one stored in the database
    echo $query = "SELECT * FROM admin WHERE email = '$email' AND otp = '$otp'";
    $result = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($result) > 0) {
        // OTP verification successf
        header('Location: reset_password.php?email=' . $email);
        exit();
    } else {
        echo "<script>alert('Error: Invalid OTP')</script>";
        header('Location: verify_otp.php?email=' . $email);
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
    <link rel="icon" href="../Images/logo-removebg-preview.PNG" type="">
    <title>UOM Complaint Portal Admin </title>
    <style>
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f4f4f4;
  background-image: url('../Images/BgImage.jpg');
  background-size: cover; /* Adjust as needed */
  background-position: center; /* Adjust as needed */
  background-color: rgba(255, 255, 255, 0.5); /* White background with 50% opacity */

}

.container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 80vh;
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
        <img src="../Images/logo-removebg-preview.PNG" alt="" width="82px" height="70px">
        <h6>Verify OPT</h6>
        <BR>
        <form id="verifyOTPForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">
            <label for="otp">Enter OTP:</label><br>
            <input type="text" id="otp" name="otp" required><br><br>
            <button style="background-color: dimgrey; height: 50px; color: azure; font-size: smaller; margin-left:170px;  border-radius:3 px;" type="submit">Verify OTP</button>
        </form>



      </div>


  </body>
</html>
