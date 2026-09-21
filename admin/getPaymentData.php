<?php
header('Content-Type: application/json');

// DB connection
$conn = new mysqli("localhost", "s24100596_magsipoc_residences", "24100596", "s24100596_magsipoc_residences");

if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed."]));
}

// Fetch roomPayment data
$sql = "SELECT roomNo, pendingPayment, paidStatus FROM roomPayment";
$result = $conn->query($sql);

$paymentData = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $paymentData[] = $row;
    }
}

$conn->close();
echo json_encode($paymentData);
?>
