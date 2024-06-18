<?php include('includes/config.php');?>
<?php 
if(!isset($_SESSION['userid'])) {
  echo "<script>window.location='Login.php'</script>";
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="./Images/logo-removebg-preview.PNG" type="">
    <title>UOM Complaint Portal</title>
    <style>
        /* Global styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
          font-family: 'Times New Roman', Times, serif;
            background-image: url('./Images/BgImage.jpg');
            background-size: cover; /* Adjust as needed */
            background-position: center; /* Adjust as needed */
            background-color: rgba(255, 255, 255, 0.5); /* White background with 50% opacity */
        }


        /* Container styles */
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            max-width: 95%;
            margin: 70px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            opacity: 0.9;
        }

        /* Input styles */
        input[type="text"],
        input[type="password"],
        input[type="email"],
        select {
            padding: 8px;
            border-radius: 3px;
            border: 1px solid #ccc;
            width: 100%;
            margin-bottom: 10px;
        }

        /* Button styles */
        #reg {
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            width: 120px;
            height: auto;
            border-radius: 5px;
            cursor: pointer;
            margin: auto;
            align-items: center;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Editor styles */
        .editor-container {
            position: relative;
            max-width: 100%;
            min-height: 150px;
            border: 1px solid #ccc;
            font-family: Arial, sans-serif;
            font-size: 16px;
            padding: 5px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .toolbar {
            position: sticky;
            top: 0;
            left: 0;
            right: 0;
            background-color: grey;
            padding: 1px;
            border-bottom: 1px solid #ccc;
            border-top-left-radius: 1px;
            border-top-right-radius: 1px;
        }

        .toolbar button {
            margin-right: 5px;
            padding: 5px;
            font-size: 16px;
            font-family: Arial, sans-serif;
            cursor: pointer;
            background: none;
            border: none;
        }

        .editor-content {
            width: auto;
            height: 200px;
            min-height: 50px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
            overflow: scroll;
        }
        form{
          width: 690px;
          padding: 20px; ;
        }

        label {
    font-weight: bold;
    margin-right: 10px; /* Add space between label and input */
  }


  /* Style for the file input */
  input[type="file"] {
    /* Hide the default file input button */
    display: none;
  }

  /* Style for the custom file input button */
  .custom-file-upload {
    display: inline-block;
    padding: 8px 12px;
    cursor: pointer;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
  }

  /* Style for the custom file input button on hover */
  .custom-file-upload:hover {
    background-color: #0056b3;
  }

  /* Style for the selected file display */
  .selected-file {
    margin-left: 10px; /* Add space between file button and file name */
  }

  /* Style for the remove icon */
  .remove-icon {
    margin-left: 5px;
    color: #f00; /* Red color for the remove icon */
    cursor: pointer;
  }



  .icon-link {
    display: inline-block;
    color: white; /* Text color */
    padding: 5px 10px;
    border-radius: 5px;
    text-decoration: none; /* Remove underline from the link */
  }

  .icon-link.a{
    color: white;
  }

  .icon-link .icon {
    margin-right: 5px; /* Space between icon and text */
  }

        @media screen and (max-width: 768px) {
          .container {
                max-width: 90%;
                padding: 5px;
                font-size: 10px;
                margin: 10px auto;
            }

            h5{
              font-size: 12px;
            }
            form{
              max-width: 100%;
              
            }

        }

        @media screen and (min-width: 768px) {
            .container {
                flex: 0 0 100%;
                max-width: 700px;
            }
            form{
              max-width: 100%;
            }

        }

        @media screen and (max-width: 200px) {
    .container {
        max-width: 100%;
        padding: 5px;
    }
    .editor-container {
        width: 100%;
    }
    form{
              max-width: 100%;
            }
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

  <?php include('includes/user_navbar.php');?>
  <?php


if(isset($_POST['update'])) {
  // Retrieve form data
  $newEmail = $_POST['email'];
  $newContact = $_POST['contact'];
  $oldPassword = $_POST['old_password'];
  $newPassword = $_POST['new_password'];
  $confirmPassword = $_POST['confirm_password'];

  

  // Check if the old password matches the password stored in the database
  $userId = $_SESSION['userid']; // Assuming you store the user's ID in a session variable
  $checkPasswordQuery = "SELECT `Password` FROM `registrations` WHERE `Enroll_ID` = '$userId'";
  $checkPasswordResult = $mysqli->query($checkPasswordQuery);

  if ($checkPasswordResult) {
      $userData = $checkPasswordResult->fetch_assoc();
      $storedPassword = $userData['Password'];

      if($oldPassword = $storedPassword) {
          // Old password matches, proceed with updates

          // Update email address
          $updateEmailQuery = "UPDATE `registrations` SET `Email_Address` = '$newEmail' WHERE `Enroll_ID` = '$userId'";
          $mysqli->query($updateEmailQuery);

          // Update contact number
          $updateContactQuery = "UPDATE `registrations` SET `Contact_No` = '$newContact' WHERE `Enroll_ID` = '$userId'";
          $mysqli->query($updateContactQuery);

          // Update password if new password and confirm password match
          if (!empty($newPassword) && $newPassword === $confirmPassword) {
              $hashedPassword = $newPassword;
           $updatePasswordQuery = "UPDATE `registrations` SET `Password` = '$hashedPassword' WHERE `Enroll_ID` = '$userId'";
              $mysqli->query($updatePasswordQuery);
          }

          // Redirect to a success page or display a success message
          echo "<script>alert('Profile updated successfully');</script>";
          echo "<script>window.location='Account.php'</script>";
      } else {
          // Old password doesn't match
          echo "<script>alert('Old password is incorrect');</script>";
      }
  } else {
      // Error occurred while checking old password
      echo "<script>alert('Error occurred while checking old password');</script>";
  }

}
?>




<?php

$select = "SELECT *
           FROM registrations
           where registrations.Enroll_ID = '".$_SESSION['userid']."'";
$selectrun = $mysqli->query($select);
$selectrow = $selectrun->fetch_array();

?>
    <div class="container">
    <?php 
      
      $select = "SELECT * FROM registrations WHERE registrations.Enroll_ID = '".$_SESSION['userid']."'";
      $selectrun = $mysqli->query($select);
      $selectrow = $selectrun->fetch_array();
      ?>
      <?php if($selectrow['profile_image']) { ?>
          <img src="uploads/<?php echo $selectrow['profile_image']; ?>" alt="" width="82px" height="70px">
      <?php } else { ?>
          <img src="./Images/logo.jpg" alt="" width="82px" height="70px">
      <?php } ?>
      <br>
      <h5>MANAGE YOUR ACCOUNT</h5>
      <BR>
      <form action="" method="POST">
    <h5>Change Email Address:</h5>
    <label for="email">New Email Address</label>
    <input type="email" id="email" name="email" value="<?php echo $selectrow['Email_Address'];?>" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" oninput="validateForm()"><br>
    <div id="emailMessage" style="display: none; color: red;"></div> <!-- Message container for email validation -->

    <hr>

    <h5>Change Contact:</h5>
    <label for="contact">New Contact Number</label>
    <input type="text" id="contact" name="contact" value="<?php echo $selectrow['Contact_No'];?>" oninput="validateForm()"><br>
    <div id="contactMessage" style="display: none; color: red;"></div> <!-- Message container for contact number validation -->

    <hr>

    <h5>Change Password:</h5>
    <label for="old_password">Old Password</label>
    <input type="password" id="old_password" name="old_password"><br>
    <div id="passwordMessage" style="display: none; color: red;"></div> <!-- Message container for password validation -->

    <label for="new_password">New Password</label>
    <input type="password" id="password" name="new_password" ><br>

    <label for="confirm_password">Retype Password</label>
    <input type="password" id="confirmPassword" name="confirm_password"><br>
    
    <br>
    <span id="passwordError" style="color: red;"></span>
        <span id="confirmPasswordError" style="color: red;"></span>
        <br/>
        <br/>
    <button name="update" id="reg" type="submit">Update</button>
</form>

    </div>

 


    <?php include('includes/Footer.php');?>

    <script>

document.getElementById("password").addEventListener("input", validatePassword);
    document.getElementById("confirmPassword").addEventListener("input", validateConfirmPassword);

    function validatePassword() {
        var password = document.getElementById("password").value;
        var passwordError = document.getElementById("passwordError");

        // Regular expressions to check for uppercase, special character, and length
        var upperCaseRegex = /[A-Z]/;
        var specialCharRegex = /[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/;

        if (password.length < 8) {
            passwordError.textContent = "Password must be at least 8 characters long";
        } else if (!upperCaseRegex.test(password)) {
            passwordError.textContent = "Password must contain at least one uppercase letter";
        } else if (!specialCharRegex.test(password)) {
            passwordError.textContent = "Password must contain at least one special character";
        } else {
            passwordError.textContent = "";
        }
    }

    function validateConfirmPassword() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmPassword").value;
        var confirmPasswordError = document.getElementById("confirmPasswordError");

        if (password !== confirmPassword) {
            confirmPasswordError.textContent = "Passwords do not match";
        } else {
            confirmPasswordError.textContent = "";
        }
    }
var fileInput = document.getElementById('file');
    var selectedFileSpan = document.querySelector('.selected-file');
    var removeIcon = document.querySelector('.remove-icon');

    fileInput.addEventListener('change', function() {
      var fileName = this.files[0].name;
      selectedFileSpan.textContent = '(' + fileName + ')';
      removeIcon.style.display = 'inline'; // Show the remove icon
    });

    removeIcon.addEventListener('click', function() {
      fileInput.value = ''; // Reset the file input
      selectedFileSpan.textContent = ''; // Remove the selected file name display
      removeIcon.style.display = 'none'; // Hide the remove icon
    });
    </script>




  </body>
</html>