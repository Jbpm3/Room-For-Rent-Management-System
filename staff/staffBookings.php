<?php
$conn = new mysqli("localhost", "s24100596_magsipoc_residences", "24100596", "s24100596_magsipoc_residences"); 

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT 
            appointments.id, 
            appointments.firstName, 
            appointments.lastName, 
            appointments.contactNo, 
            appointments.email, 
            roomBookings.checkInDate, 
            roomBookings.checkInStatus,
            roomBookings.id AS bookingId
        FROM appointments
        LEFT JOIN roomBookings 
        ON appointments.id = roomBookings.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Bookings</title>
    <link rel="stylesheet" href="staffBookings.css">
    <script src="staffBookings.js" defer></script>
</head>
<body>

    <?php include_once('../include/userHeaderStaff.php'); ?>

    <div class="container">
        <div class="button-container">
            <a href="staff.php"><div class="bookings-button">Bookings</div></a>
        </div>

        <div class="full-view-container">
            <div class="row-container header">
                <div class="cell">First Name</div>
                <div class="cell">Last Name</div>
                <div class="cell">Contact No.</div>
                <div class="cell">Email</div>
                <div class="cell">Date Called</div>
                <div class="cell">Booking Status</div>
                <div class="cell">Status</div>
            </div>

            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="row-container">';
                    echo '<div class="cell">' . htmlspecialchars($row["firstName"]) . '</div>';
                    echo '<div class="cell">' . htmlspecialchars($row["lastName"]) . '</div>';
                    echo '<div class="cell">' . htmlspecialchars($row["contactNo"]) . '</div>';
                    echo '<div class="cell">' . htmlspecialchars($row["email"]) . '</div>';
                    echo '<div class="cell">' . htmlspecialchars($row["checkInDate"]) . '</div>';
                    echo '<div class="cell">' . htmlspecialchars($row["checkInStatus"]) . '</div>';
                    echo '<div class="cell"><button class="edit-button" onclick="openModal(' . $row["bookingId"] . ')">Edit</button></div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="row-container"><div class="cell" colspan="7">No bookings found</div></div>';
            }
            $conn->close();
            ?>
        </div>
    </div>

    <!-- Modal -->
    <div id="statusModal" class="modal">
        <div class="modal-content">
            <h3>Select Booking Status</h3>
            <button class="status-button" onclick="updateBooking(selectedId, 'Pending')">Pending</button>
            <button class="status-button" onclick="updateBooking(selectedId, 'Appointed')">Appointed</button>
            <br><br>
            <button class="status-button close-btn" onclick="closeModal()">Cancel</button>
        </div>
    </div>

</body>
</html>
