<?php 
include('../includes/config.php');

if(isset($_POST['id'], $_POST['status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];
    
    $sql = "UPDATE complaint SET STATUS = ? WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("si", $status, $id);
    
    if ($stmt->execute()) {
        echo "Status updated successfully";
        // Redirect to All_Complaints.php
        header("Location: All_Complaints.php");
        exit(); // Ensure no further execution after redirection
    } else {
        echo "Error updating status: " . $mysqli->error;
    }
    $stmt->close();
} else {
    echo "Invalid request";
}
?>
