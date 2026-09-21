<?php
// DB connection
$conn = new mysqli("localhost", "s24100596_magsipoc_residences", "24100596", "s24100596_magsipoc_residences");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to join the tables
$query = "
    SELECT 
        g.roomNo, 
        g.guestName, 
        g.contactNo, 
        rp.pendingPayment, 
        rp.paidStatus, 
        f.feedback 
    FROM guests g
    LEFT JOIN roomPayment rp ON g.roomNo = rp.roomNo
    LEFT JOIN feedback f ON g.roomNo = f.roomNo
";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Store the result as an array
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    $data = [];
}

$conn->close();
?>
