<?php
header('Content-Type: application/json');

$conn = new mysqli("localhost", "s24100596_magsipoc_residences", "24100596", "s24100596_magsipoc_residences");

if ($conn->connect_error) {
    die(json_encode(["message" => "Connection failed: " . $conn->connect_error]));
}

// Get the JSON input
$data = json_decode(file_get_contents("php://input"), true);

// Debugging: Log the received data
error_log(print_r($data, true));

if (isset($data['roomNo']) && isset($data['statusUpdate'])) {
    $roomNo = $conn->real_escape_string($data['roomNo']);
    $statusUpdate = $conn->real_escape_string($data['statusUpdate']);

    // Update the status in the database
    $sql = "UPDATE roomStatus SET statusUpdate='$statusUpdate' WHERE roomNo='$roomNo'";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Status updated successfully."]);
    } else {
        echo json_encode(["message" => "Error updating status: " . $conn->error]);
    }
} else {
    echo json_encode(["message" => "Invalid input."]);
}

$conn->close();
?>