<?php include('includes/config.php');?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="./Images/logo-removebg-preview.PNG" type="">
    <title>UOM Complaint Portal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 15px;
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
             height: auto;
            max-width: 500px;
            margin-Right:0px ;
            padding: 30px;
            background-color: #fff;
        }

        form {
            width: 100%;
        }

        img {
            margin-bottom: 20px; /* Optional: Add space below the image */
        }

        h6 {
            text-align: center;
            margin-bottom: 20px;
        }

        label,
        input,
        .options {
        
         width: 35%;
         height: 28px;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        select {
            padding: 8px;
            border-radius: 3px;
            border: 1px solid #ccc;
           width: 60%;
        }

        button {
            padding: 3px;
            background-color: #007bff;
            color: #fff;
            border: none;
            width: 120px;
            border-radius: 10px;
            cursor: pointer;
            margin-left: 170px;
       
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

        /* Pop-up message styles */
        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 20px;
            border-radius: 10px;
            display: none;
            z-index: 9999;
            animation: popupFadeIn 0.5s ease forwards;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
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
            height:25px;
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

        @keyframes popupFadeIn {
            from {
                opacity: 0;
                transform: translate(-50%, -50%) scale(0.8);
            }
            to {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1);
            }
        }

    </style>
</head>
<body>
<?php
if(isset($_POST['submit']))
{
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

            // Process other form data
            $enrollId = $_POST['enrollId'];
            $name = $_POST['name'];
            $fatherName = $_POST['fatherName'];
            $email = $_POST['email'];
            $cnic = $_POST['cnic'];
            $contactNo = $_POST['contactNo'];
            $role = $_POST['role'];
            $department = $_POST['department'];
            $session = $_POST['session'];
            $password = $_POST['password'];

            // Insert data into the database
            $insert = "INSERT INTO `registrations`(`Enroll_ID`, `Name`, `Father_Name`, `CNIC`, `Email_Address`, `Contact_No`, `Role_ID`, `Department_ID`, `Session`, `Password`,`profile_image`) 
            VALUES ('$enrollId','$name','$fatherName','$cnic','$email','$contactNo','$role','$department','$session','$password','$fileName')";
            $runquery = $mysqli->query($insert);

            if($runquery) {
                echo "<script>alert('Your registration request has been submitted. We will verify your details and send an email with further instructions.')</script>";
            } else {
                echo "<script>alert('Oops! Something went wrong.')</script>";
            }
        } else {
            echo "<script>alert('Invalid file format. Only JPG, JPEG, PNG, and GIF files are allowed.')</script>";
        }
    } else {
        echo "<script>alert('File upload failed.')</script>";
    }
}
?>
<div class="container">
    <img src="./Images/logo.jpg" alt="" width="82px" height="70px">
    <h6>REGISTRATION PORTAL</h6>
    <form id="registrationForm" action="" method="POST" enctype="multipart/form-data">
        <label class="custom-file-upload" for="file" style = " height : 30px;">Choose picture</label>
        <!-- Actual file input element (hidden) -->
        <input type="file" id="file" name="image" accept=".jpg, .jpeg, .png" required>
        <span class="selected-file"></span>
        <i class="remove-icon fas fa-times-circle" style="display: none;"></i>
        <br><br>
        <label for="enrollId">Enroll ID:</label>
        <input type="text" id="enrollId" name="enrollId" required>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="fatherName">Father Name:</label>
        <input type="text" id="fatherName" name="fatherName" required>
        <label for="cnic">CNIC:</label>
        <input type="text" id="cnic" name="cnic" required>
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required>
        <label for="contactNo">Contact No:</label>
        <input type="text" id="contactNo" name="contactNo" required>
        <label for="role">Role:</label>
        <select id="role" name="role" required>
            <option value="">Select Your Role</option>
            <?php
            $role = "SELECT * FROM roles";
            $run = $mysqli->query($role);
            while($stmt = $run->fetch_array()) {
                ?>
                <option value="<?php echo $stmt['id'];?>"><?php echo $stmt['role_name'];?></option>
            <?php } ?>
        </select>
        <br><br>
        <label for="department">Department:</label>
        <select id="department" name="department" required>
            <option value="">Select Your Department</option>
            <?php
            $dept = "SELECT * FROM departments";
            $deptrun = $mysqli->query($dept);
            while($deptstmt = $deptrun->fetch_array()) {
                ?>
                <option value="<?php echo $deptstmt['id'];?>"><?php echo $deptstmt['dep_name'];?></option>
            <?php } ?>
        </select> <br><br>
        <label for="session">Session:</label>
        <input type="text" id="session" name="session" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required>
        <br/>
        <span id="passwordError" style="color: red;"></span>
        <span id="confirmPasswordError" style="color: red;"></span>
        <br/>
        <br/>
        <br/>
        <button type="submit" name="submit" >Register</button>
        <br>
        <br>
        <div class="options">
            <a href="index.php"  style = "margin-left: 230px;">Login</a>
     
        </div>
    </form>
</div>
<script>
    // Add event listeners to input fields to trigger validation
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
