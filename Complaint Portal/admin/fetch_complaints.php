<?php
// Include database connection
include('../includes/config.php');

// Check if selectedMonth parameter is set
if(isset($_POST['selectedMonth'])) {
    // Sanitize and validate the selected month
    $selectedMonth = mysqli_real_escape_string($mysqli, $_POST['selectedMonth']);

    // Construct the SQL query to fetch complaints data for the selected month
    $sql = "SELECT category_name, COUNT(*) AS num_complaints 
            FROM complaint 
            INNER JOIN complaint_category ON complaint.Com_CatId = complaint_category.id
            WHERE MONTH(created_date) = ? 
            GROUP BY complaint.Com_CatId";

    // Prepare the statement
    $stmt = $mysqli->prepare($sql);

    // Bind the parameter
    $stmt->bind_param('s', $selectedMonth);

    // Execute the query
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Initialize arrays to store labels and data
    $labels = [];
    $data = [];

    // Fetch data and store it in arrays
    while ($row = $result->fetch_assoc()) {
        $labels[] = $row['category_name'];
        $data[] = $row['num_complaints'];
    }

    // Close statement
    $stmt->close();

    // Construct JSON response
    $response = array(
        'labels' => $labels,
        'data' => $data
    );

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // If selectedMonth parameter is not set, return error response
    echo 'Error: No selected month parameter provided';
}
?>
