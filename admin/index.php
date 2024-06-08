<?php include('../includes/config.php');?>

<?php 

    if (isset($_POST['login'])) {
        
         $username=$_POST['username'];
         $password=$_POST['password'];

          $data="SELECT * FROM admin WHERE username='$username' AND password='$password'";
         $run=$mysqli->query($data);

        if (mysqli_num_rows($run)==1) {
            $row=$run->fetch_array();
            $_SESSION['adminid']= $row['id'];
            $_SESSION['user']= $row['username'];
        echo '<script>window.location="admin.php";</script>';

        }else{
            echo '<script>alert("Username And Password Incorrect");</script>';
            echo '<script>window.location="index.php";</script>';

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
    <link rel="icon" href="../logo-removebg-preview.PNG" type="">
    <title>UOM Complaint Portal Admin </title>
    <style>
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f4f4f4;
  background-image: url('../BgImage.JPG');
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
  max-width: 450px;
  margin-right: 0px;
  padding: 20px;
  background-color: #fff;
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
}

button {
  padding: 10px;
  background-color: #007bff;
  color: #fff;
  border: none;
  width: 120px;
  border-radius: 10px;
  cursor: pointer;
  margin: auto;
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
        <img src="../logo-removebg-preview.PNG" alt="" width="82px" height="70px">
        <h6>UOM COMPLAINT PORTAL</h6>
        <p>Admin Login</p>
        <BR>
        <form id="" action="" method="POST">
          <label for="username">Username OR E-mail</label>
          <input type="text" id="username" name="username" required>
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required>
          <br>
          <button type="submit" name="login">Login</button>
          
            <hr>
            <a href="Forgot.php" style="font-size: small;">FORGOT PASSWARD ?</a>
            <hr>
            <br>
            
            <br>
            <p style="font-size: smaller;"> copyright © 2024</p>
          </div>
          
        </form>
      </div>


  </body>
</html>