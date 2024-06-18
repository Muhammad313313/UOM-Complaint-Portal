<?php include('../includes/config.php');
include('smtp/PHPMailerAutoload.php');
?>
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

    
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <link rel="icon" href="../Images/logo-removebg-preview.PNG" type="">
    <title>UOM Complaint Portal Admin </title>
    <style>
        /* Global styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
          font-family: 'Times New Roman', Times, serif;
            background-image: url('../Images/BgImage.jpg');
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
            max-width: 45%;
            margin: 70px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            opacity: 0.9;
        }

        .profile {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .profile img {
            border-radius: 50%;
            margin-right: 20px;
        }

        .details {
            line-height: 1.6;
        }

        /* Button styles */
        button {
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

        .icon-link {
            display: inline-block;
            color: white; /* Text color */
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none; /* Remove underline from the link */
        }

        .icon-link.a {
            color: white;
        }

        .icon-link .icon {
            margin-right: 5px; /* Space between icon and text */
        }

        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 20px;
            border-radius: 5px;
            display: none;
            z-index: 9999;
        }



    </style>
  </head>
  <body>

    <!-- Navbar -->
    <!-- Your navbar code here -->
    <?php include('../includes/admin_navbar.php');?>

    <div class="container">

      <h5> DETAILS</h5>
      <BR>
        <br>
        <div class="profile">
        <?php 
                  $select = "SELECT r.*, roles.role_name, departments.dep_name
                  FROM registrations AS r
                  JOIN roles ON roles.id = r.Role_ID
                  JOIN departments ON departments.id = r.Department_ID
                  WHERE r.Enroll_ID = '".$_GET['id']."';
                  ";
                  $selectrun = $mysqli->query($select);
                  $sno = 1;
                  while($selectrow = $selectrun->fetch_array()) {
                ?>
          <div class="details">
              <p><strong>Enroll Id:</strong> <?php echo $selectrow['Enroll_ID'];?></p>
              <p><strong>Name:</strong> <?php echo $selectrow['Name'];?></p>
              <p><strong>Father Name:</strong> <?php echo $selectrow['Father_Name'];?></p>
              <p><strong>CINC:</strong> <?php echo $selectrow['CNIC'];?></p>
              <p><strong>Email Id:</strong> <?php echo $selectrow['Email_Address'];?></p>
              <p><strong>Contact No:</strong> <?php echo $selectrow['Contact_No'];?></p>
              <p><strong>Role:</strong> <?php echo $selectrow['role_name'];?></p>
              <p><strong>Department:</strong> <?php echo $selectrow['dep_name'];?></p>
              <p><strong>Session:</strong> <?php echo $selectrow['Session'];?></p>
              <a href="test.php?email=<?php echo $selectrow['Email_Address'];?>"><button id="activateBtn" name='activateBtn' style="margin-right: 50px;" onclick="activeRegistration()"> Activate</button></a>
              <button id="activateBtn" style="margin-left: 50px;" onclick="blockRegistration()">Block</button>
                    
          </div>
          <?php } ?>
      </div>
    </div>
    <?php
// Include PHPMailer library


// Check if the button is clicked
if(isset($_POST['activateBtn'])) {
    // Replace 'to_email' with the actual recipient email address

// Replace 'to_email' with the actual recipient email address
$to_email = 'fawadafzal2017@gmail.com';

// Replace 'Subject' with the actual email subject
$subject = 'Your Subject Here';

// Replace 'html' with the actual HTML content of your email message
$html_message = '<html>hey</html>';

echo smtp_mailer($to_email, $subject, $html_message);

function smtp_mailer($to, $subject, $msg){
    $mail = new PHPMailer(); 
    $mail->IsSMTP(); 
    $mail->SMTPAuth = true; 
    $mail->SMTPSecure = 'tls'; 
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587; 
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    // Uncomment the line below if you want to enable debugging
    // $mail->SMTPDebug = 2; 
    $mail->Username = 'fawadafzal2017@gmail.com'; // Replace with your Gmail email address
    $mail->Password = 'rkhy hgni hmrm bofc'; // Replace with your Gmail app-specific password
    $mail->SetFrom('fawadafzal2017@gmail.com', 'Your Name'); // Replace with the sender's email address and name
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        )
    );
    if(!$mail->Send()){
        return $mail->ErrorInfo;
    } else {
        return 'Sent';
    }
}
}
?>

    <!-- Popup message -->
    <div id="popupMessage" class="popup">Email sent!</div>

    <!-- Footer -->
    <!-- Your footer code here -->

    <script>
        function activeRegistration() {
    // Submit the form when the button is clicked
    document.getElementById("activateForm").submit();
}
        // Add jQuery
        $(document).ready(function() {
            // Show the popup message when the Activate button is clicked
            $("#activateBtn").click(function() {
                $("#popupMessage").fadeIn().delay(2000).fadeOut(); // Show the popup for 2 seconds
            });
        });
        function blockRegistration() {
    // Get the registration ID
    var registrationId = <?php echo $_GET['id']; ?>;

    // Send AJAX request to update registration status
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "update_status.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Reload the page or update the UI as needed
            // window.location.href = "Validate_User.php";
        }
    };
    xhr.send("id=" + registrationId);
}
function activeRegistration() {
    // Get the registration ID
    var registrationId = <?php echo $_GET['id']; ?>;

    // Send AJAX request to update registration status
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "update_status_active.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Reload the page or update the UI as needed
            // window.location.href = "Validate_User.php";
        }
    };
    xhr.send("id=" + registrationId);
}
    </script>

  </body>
</html>
