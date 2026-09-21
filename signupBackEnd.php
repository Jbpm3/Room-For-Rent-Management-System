<?php
session_start();

$conn = new mysqli("localhost", "s24100596_magsipoc_residences","24100596","s24100596_magsipoc_residences");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fName = $_POST["fName"];
$lName = $_POST["lName"];
$email = $_POST["email"];
$contact = $_POST["contact"];

// Insert into appointments
$sql = "INSERT INTO appointments (firstName, lastName, email, contactNo) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $fName, $lName, $email, $contact);

if ($stmt->execute()) {
    $appointmentId = $stmt->insert_id;  // Get ID of newly inserted appointment

    // Now insert into roomBookings with current date and default 'Pending' status
    $checkInDate = date("F j, Y");  // e.g., "May 10, 2025"
    $checkInStatus = "Pending";

    $sql2 = "INSERT INTO roomBookings (id, checkInDate, checkInStatus) VALUES (?, ?, ?)";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("iss", $appointmentId, $checkInDate, $checkInStatus);
    $stmt2->execute();
    
    // Redirect only after both inserts succeed
    header("Location: registerVerify.php");
    exit;
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
