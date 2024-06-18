<?php include('../includes/config.php');?>
<?php 
if(!isset($_SESSION['adminid'])) {
  echo "<script>window.location='index.php'</script>";
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
  height: 150vh;
  max-width: 500px;
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
  margin-bottom: 10px; 
}

.options a:hover {
  text-decoration: underline;
}

select {
    width: 100%;
    padding: 8px;
    border-radius: 3px;
    border: 1px solid #ccc;
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
    <?php include('../includes/admin_navbar.php');?>

    <div class="container">
    
        <h6>EDIT USER REGISTERATION</h6>
        <BR>
        <?php
$select = "SELECT registrations.*, departments.*, roles.*
FROM registrations
JOIN departments ON registrations.Department_ID = departments.id
JOIN roles ON registrations.Role_ID = roles.id
WHERE registrations.Enroll_ID = '".$_GET['editid']."'";
$selectrun = $mysqli->query($select);
$selectrow = $selectrun->fetch_array();
?>
        <form id="loginForm"  method="post">
          <label for="enrollId">Enroll Id:</label>
          <input type="text" id="enrollId" name="enrollId" value="<?php echo $selectrow['Enroll_ID'];?>" readonly>
          <label for="name">Name:</label>
          <input type="text" id="name" name="name"  value="<?php echo $selectrow['Name'];?>" >
          <label for="fatherName">Father Name:</label>
          <input type="text" id="fatherName" name="fatherName"  value="<?php echo $selectrow['Father_Name'];?>" >
          <label for="cnic">CINC:</label>
          <input type="text" id="cnic" name="cnic"  value="<?php echo $selectrow['CNIC'];?>" >
          <label for="username">Email Address</label>
          <input type="email" id="email" name="email"  value="<?php echo $selectrow['Email_Address'];?>"  pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required>
          <label for="contactNo">Contact No:</label>
          <input type="text" id="contactNo" name="contactNo"  value="<?php echo $selectrow['Contact_No'];?>" >
          <label for="department">Department:</label>
          <select id="department" name="department" required>
        <option value="<?php echo $selectrow['Department_ID'];?>"><?php echo $selectrow['dep_name'];?></option>
        <?php
            $role = "SELECT * FROM departments where id !='".$selectrow['Department_ID']."'";
            $run = $mysqli->query($role);
            while($stmt = $run->fetch_array()) {
                ?>
                <option value="<?php echo $stmt['id'];?>"><?php echo $stmt['dep_name'];?></option>
            <?php } ?>
        </select>
          <br> <br>
          <label for="session">Session:</label>
          <input type="text" id="session" name="session"  value="<?php echo $selectrow['Session'];?>" >
          <label for="password">Passward</label>
          <input type="password" id="Passward" name="Passward" required  value="<?php echo $selectrow['Password'];?>" >
          <label for="password">Confirm Passwarrd</label>
          <input type="password" id="Confirm password" name="Confirm password" required  value="<?php echo $selectrow['Password'];?>" >
          <br>
          <br>
          <button type="submit" name="update">update</button>
        
          
        </form>
      </div>
      <?php 
      $editid = $_GET['editid'];
      if(isset($_POST['update']))
{
    
    $name = $_POST['name'];
    $fatherName = $_POST['fatherName'];
    $email = $_POST['email'];
    $cnic = $_POST['cnic'];
    $contactNo = $_POST['contactNo'];
    $department = $_POST['department'];
    $session = $_POST['session'];
    $Passward = $_POST['Passward'];
    // Assuming $_POST['id'] contains the ID of the registration you want to update
   
    // Update query
    $update = "UPDATE `registrations` 
               SET `Name`='$name', 
                   `Father_Name`='$fatherName', 
                   `CNIC`='$cnic', 
                   `Email_Address`='$email', 
                   `Contact_No`='$contactNo',  
                   `Department_ID`='$department', 
                   `Session`='$session',
                   `Password` = '$Passward'
               WHERE `Enroll_ID`='$editid'";

    $runquery = $mysqli->query($update);
    if($runquery)
    {
        echo "<script>alert('Your registration request has been updated.')</script>";
        echo "<script>window.location='All_Users.php'</script>";
    }
    else {
        echo "<script>alert('Oops! Something went wrong while updating the registration.')</script>";
    }
}
?>


  </body>
</html>