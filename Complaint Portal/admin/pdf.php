<?php
// Include your database configuration file
require_once('../includes/config.php');

// Check if complaint ID is provided in the URL parameter
if (isset($_GET['id'])) {
    // Sanitize the input
    $id = mysqli_real_escape_string($mysqli, $_GET['id']);

    // SQL query to fetch complaint details
    $sql = "SELECT * FROM complaint
            JOIN complaint_category ON complaint.Com_CatId = complaint_category.id
            WHERE complaint.id = $id";
    
    // Execute the query
    $result = $mysqli->query($sql);

    // Check if the query was successful
    if ($result && $result->num_rows > 0) {
        // Fetch data from the result set
        $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>Complaint Details</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <img src="../Images/logo.jpg" alt="Logo" width="150px" height="150px">
            </div>
            <div class="col-9">
                <h5>UOM COMPLAINT PORTAL</h5>
                <h6>Complaint ID: <?php echo $row['id']; ?></h6>
                <h6>Complaint Category: <?php echo $row['category_name']; ?></h6>
                <h6>Subject: <?php echo $row['Subject']; ?></h6>
            </div>
        </div>
        <hr>
        <hr>
        <p><?php echo $row['Description']; ?></p>
        <h5>Media</h5>
        <div class="col-9">
            <h1>okk</h1>
            <img src="../uploads/<?php echo $row['Upload_Picture']; ?>" alt="Complaint Image" width="150px" height="150px">
            <img src="../uploads/computer01.jpg" alt="">
        </div>
        <hr>
        <button style="color: dodgerblue;" onclick="printPage()">Print</button>
        <p>Admin@email.com</p>
    </div>

    <script>
        function printPage() {
            window.print();
        }
    </script>
</body>
</html>
<?php
    } else {
        // If no data found for the complaint ID
        echo "No complaint found with ID: $id";
    }

    // Free result set
    $result->free();

    // Close MySQLi connection
    $mysqli->close();
} else {
    // If complaint ID is not provided in the URL parameter
    echo "Complaint ID not provided.";
}
?>
