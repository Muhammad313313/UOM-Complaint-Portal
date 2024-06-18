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

  .icon-link.a{
    color: white;
  }

  .icon-link .icon {
    margin-right: 5px; /* Space between icon and text */
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
    <!-- Navbar -->
    <?php include('../includes/admin_navbar.php');?>

<br>






    <div class="container">
  
      <h5> COMPLAINER DETAILS</h5>
      <BR>
        <br>
        <div class="profile">
        <?php 
                $select = "SELECT registrations.*, departments.*
                FROM registrations
                JOIN departments ON registrations.Department_ID = departments.id
                WHERE registrations.Enroll_ID = '".$_GET['cid']."'
                ";
                $selectrun = $mysqli->query($select);
                $selectrow = $selectrun->fetch_array();
                ?>
          <div class="details">
              <p><strong>Enroll Id:</strong> <?php echo $selectrow['Enroll_ID'];?></p>
              <p><strong>Name:</strong> <?php echo $selectrow['Name'];?></p>
              <p><strong>Father Name:</strong> <?php echo $selectrow['Father_Name'];?></p>
              <p><strong>CINC:</strong> <?php echo $selectrow['CNIC']?></p>
              <p><strong>Email Id:</strong> <?php echo $selectrow['Email_Address'];?></p>
              <p><strong>Contact No:</strong> <?php echo $selectrow['Contact_No'];?></p>
              <p><strong>Department:</strong> <?php echo $selectrow['dep_name'];?></p>
              <p><strong>Session:</strong> <?php echo $selectrow['Session'];?></p>
              <button onclick="window.print()">Print</button>

          </div>
      </div>
    </div>

 




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