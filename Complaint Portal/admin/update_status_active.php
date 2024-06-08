<?php
include('../includes/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $registrationId = $_POST['id'];

    // Update the status of the registration
    $updateQuery = "UPDATE registrations SET status = 1 WHERE Enroll_ID = ?";
    $stmt = $mysqli->prepare($updateQuery);
    $stmt->bind_param("i", $registrationId);
    $stmt->execute();
    $stmt->close();
}
?>
