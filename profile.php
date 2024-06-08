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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="logo-removebg-preview.PNG" type="">
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
            background-image: url('BgImage.jpg');
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
            min-height: auto;
            max-width: 85%;
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
<?php include('includes/user_navbar.php'); ?>

<?php 
// Initialize $fileName with a default value
$fileName = "";

$select = "SELECT registrations.*, departments.*, roles.*
           FROM registrations
           JOIN departments ON registrations.Department_ID = departments.id
           JOIN roles ON registrations.Role_ID = roles.id
           WHERE registrations.Enroll_ID = '".$_SESSION['userid']."'";
$selectrun = $mysqli->query($select);
$selectrow = $selectrun->fetch_array();

if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
    // Specify the directory where you want to store uploaded files
    $targetDir = "uploads/";

    // Get the name of the uploaded file
    $fileName = basename($_FILES["image"]["name"]);

    // Specify the path where the file will be stored
    $targetFilePath = $targetDir . $fileName;

    // Get the file extension
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('jpg', 'jpeg', 'png', 'gif');

    if (in_array($fileType, $allowTypes)) {
        // Upload file to the specified directory
      move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);
           
    } 
}

if(isset($_POST['update']))
{
    $enrollId = $_POST['enrollId'];
    $name = $_POST['name'];
    $fatherName = $_POST['fatherName'];
    $email = $_POST['email'];
    $cnic = $_POST['cnic'];
    $contactNo = $_POST['contactNo'];
    $role = $_POST['role'];
    $department = $_POST['department'];
    $session = $_POST['session'];
    // Assuming $_POST['id'] contains the ID of the registration you want to update
   
    // Update query
    $update = "UPDATE `registrations` 
               SET `Enroll_ID`='$enrollId', 
                   `Name`='$name', 
                   `Father_Name`='$fatherName', 
                   `CNIC`='$cnic', 
                   `Email_Address`='$email', 
                   `Contact_No`='$contactNo', 
                   `Role_ID`='$role', 
                   `Department_ID`='$department', 
                   `Session`='$session', 
                   `profile_image`= '$fileName' 
               WHERE `Enroll_ID`='".$_SESSION['userid']."'";

    $runquery = $mysqli->query($update);
    if($runquery)
    {
        echo "<script>alert('Your registration request has been updated.')</script>";
        echo "<script>window.location='Profile.php'</script>";
    }
    else {
        echo "<script>alert('Oops! Something went wrong while updating the registration.')</script>";
    }
}
?>



    <div class="container">
      <?php if($selectrow['profile_image']) { ?>
        <img src="uploads/<?php echo $selectrow['profile_image'];?>" alt="" width="82px" height="70px">
        <?php } else { ?>
      <img src="logo.jpg" alt="" width="82px" height="70px">
      <?php } ?>
      <br>
      <h5>MANAGE YOUR PROFILE</h5>
      <BR>
        <form id="" method="POST" enctype="multipart/form-data">
          <label for="file">Profile Picture:</label>
          <br>
            <!-- Custom file input button -->
            <label class="custom-file-upload" for="file">Choose picture</label>
          
            <!-- Actual file input element (hidden) -->
            <input type="file" id="file" name="image" accept=".jpg, .jpeg, .png" >
            <span class="selected-file"></span>
            <i class="remove-icon fas fa-times-circle" style="display: none;"></i>
          <br><br>
          <label for="enrollId">Enroll ID:</label>
          <input type="text" id="enrollId" name="enrollId"  value="<?php echo $selectrow['Enroll_ID'];?>" Readonly>
          <label for="name">Name:</label>
          <input type="text" id="name" name="name"  value="<?php echo $selectrow['Name'];?>">
          <label for="fatherName">Father Name:</label>
          <input type="text" id="fatherName" name="fatherName" value="<?php echo $selectrow['Father_Name'];?>" >
          <label for="cnic">CNIC:</label>
          <input type="text" id="cnic" name="cnic"   value="<?php echo $selectrow['CNIC'];?>">
          <label for="email">Email Address:</label>
          <input type="email" id="email" name="email" value="<?php echo $selectrow['Email_Address'];?>" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" >
          <label for="contactNo">Contact No:</label>
          <input type="text" id="contactNo" name="contactNo"  value="<?php echo $selectrow['Contact_No'];?>">
          <label for="role">Role:</label>
            <select id="role" name="role" >
            <option value="<?php echo $selectrow['Role_ID'];?>"><?php echo $selectrow['role_name'];?></option>
            <?php
            $role = "SELECT * FROM roles where id !='".$selectrow['Role_ID']."'";
            $run = $mysqli->query($role);
            while($stmt = $run->fetch_array()) {
                ?>
                <option value="<?php echo $stmt['id'];?>"><?php echo $stmt['role_name'];?></option>
            <?php } ?>
        </select>
        <br><br>
        <label for="department">Department:</label>
        <select id="department" name="department" >
        <option value="<?php echo $selectrow['Department_ID'];?>"><?php echo $selectrow['dep_name'];?></option>
        <?php
            $role = "SELECT * FROM departments where id !='".$selectrow['Department_ID']."'";
            $run = $mysqli->query($role);
            while($stmt = $run->fetch_array()) {
                ?>
                <option value="<?php echo $stmt['id'];?>"><?php echo $stmt['dep_name'];?></option>
            <?php } ?>
        </select> <br><br>
          <label for="session">Session:</label >
          <input type="datetime" class="form-control" id="session" name="session" value="<?php echo $selectrow['Session'];?>">
            </select> <br><br>
       
          <button id="reg" type="submit" name="update">Update</button>
        
          
        </form>
    </div>

 


    <?php include('includes/Footer.php');?>

    <script>


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