<?php
session_start();

// Database connection
$conn = new mysqli("localhost", "s24100596_magsipoc_residences", "24100596", "s24100596_magsipoc_residences");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Debug: Output received POST data
var_dump($_POST);  // Check if roomNo and requestService are being received correctly

// Check if the necessary parameters are set
if (isset($_POST['roomNo']) && isset($_POST['requestService'])) {
    $roomNo = $_POST['roomNo'];
    $requestService = $_POST['requestService'];

    // Update query to set requestService field to "YES"
    $sql = "UPDATE guestRooms SET requestService = ? WHERE roomNo = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $requestService, $roomNo);

    if ($stmt->execute()) {
        echo "Service request updated successfully!";
    } else {
        echo "Error updating the service request!";
    }

    $stmt->close();
} else {
    echo "Invalid parameters!";
}

$conn->close();
?>
