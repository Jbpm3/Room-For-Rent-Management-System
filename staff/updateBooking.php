<?php
$conn = new mysqli("localhost", "s24100596_magsipoc_residences", "24100596", "s24100596_magsipoc_residences");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'] ?? null;
$status = $_POST['status'] ?? null;

// Validate inputs
if (!in_array($status, ['Pending', 'Appointed']) || !is_numeric($id)) {
    http_response_code(400);
    echo "Invalid input.";
    exit;
}

// Use prepared statement
$stmt = $conn->prepare("UPDATE roomBookings SET checkInStatus = ? WHERE id = ?");
$stmt->bind_param("si", $status, $id);

if ($stmt->execute()) {
    echo "Status updated successfully.";
} else {
    echo "Error updating status.";
}

$stmt->close();
$conn->close();
?>
