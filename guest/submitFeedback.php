<?php
// Database connection
$conn = new mysqli("localhost", "s24100596_magsipoc_residences", "24100596", "s24100596_magsipoc_residences");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the necessary parameters are provided
if (isset($_POST['roomNo']) && isset($_POST['requestService'])) {
    // Get the room number and feedback
    $roomNo = $_POST['roomNo'];
    $feedback = $_POST['requestService'];

    // Prepare and bind to avoid SQL injection
    $stmt = $conn->prepare("INSERT INTO guestRooms (roomNo, requestService) VALUES (?, ?)");
    $stmt->bind_param("ss", $roomNo, $feedback);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Feedback submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
} else {
    echo "Invalid request.";
}

// Close the database connection
$conn->close();
?>