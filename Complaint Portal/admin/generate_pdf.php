<?php
require_once('../includes/config.php');


// Get complaint ID from URL parameter
if(isset($_GET['id'])) {
    $id = $_GET['id'];


   
    // SQL query to fetch data for the complaint with the specified ID
    $sql = "SELECT *
    FROM complaint
    JOIN complaint_category ON complaint.Com_CatId = complaint_category.id
     WHERE complaint.id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a row is found
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Start ca
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Details</title>
    <style>
        /* Your CSS styles here */
        body {
        font-family: 'Times New Roman', Times, serif;
          background-image: url('../BgImage.jpg');
          background-size: cover; /* Adjust as needed */
          background-position: center; /* Adjust as needed */
          background-color: rgba(255, 255, 255, 0.5); /* White background with 50% opacity */
      }

      .container {
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          min-height: auto;
          max-width: 65%;
          margin: 5px auto;
          padding: 20px;
          background-color: #fff;
          border-radius: 10px;
          
          
      }


  
        .row {
            display: flex;
        }
        .col-3 {
            flex: 0 0 15%;
        }
        .col-9 {
            flex: 0 0 85%;
        }

       h3{
        text-align:center;
       }

 
    </style>
</head>
<body>
    
    
    <div class="container">
        <div class="row">
            <div class="col-3">
                <img src="../logo-removebg-preview.png" alt="" width="120px" height="100px"> &nbsp;&nbsp;
                
            </div>
            <div class="col-9">
                <h2> University Of Malakank COMPLAINT PORTAL</h2>
                
                <spin>  <strong> Complaint Id: </strong> <?php echo $row['id']; ?></spin> &nbsp;&nbsp; &nbsp;&nbsp; <spin> <strong>  Complaint Category:</strong>  <?php echo $row['category_name']; ?></spin>
                <h4> <strong> Subject: </strong> <u> <?php echo $row['Subject']; ?> </u> </h4>
                <hr>
                
            </div>
        </div>
        <hr>
        <hr>
        <div>
        <h3>Description</h3>
        <p><?php echo $row['Description']; ?></p>

        </div>
        <h3>Media</h3>
        <div class="col-9">
                <img src="../uploads/<?php echo $row['Upload_Picture'];?>" alt="" width="500px" height="500px">
        </div>

        <hr>
        <p>Admin@email.com</p>
        <div class="details">
<button onclick="window.print()">Print</button>
    </div>
    </div>
</body>
</html>


<?php }  } } ?>