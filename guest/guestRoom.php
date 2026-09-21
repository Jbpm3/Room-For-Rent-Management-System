<?php
session_start();
echo '<link rel="stylesheet" href="guestRoom.css">';

// Check if the user is logged in as a guest
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'guest') {
    header("Location: ../login.php");
    exit();
}

// Get the logged-in room number
$roomNo = str_replace("room", "", $_SESSION['room']);

// Database connection
$conn = new mysqli("localhost", "s24100596_magsipoc_residences", "24100596", "s24100596_magsipoc_residences");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the specific room details
$sql = "SELECT * FROM guestRooms WHERE roomNo = '$roomNo'";
$result = $conn->query($sql);

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Room</title>
    <link rel="stylesheet" href="guestRoom.css">
</head>
<body>

    <!-- Header -->
    <?php include_once('../include/userHeaderGuest.php') ?>

    <!-- Main Container -->
    <div class="container">
        
        <!-- Navigation Button -->
        <div class="button-container">
            <a href="guest.php"><div class="button">My Room</div></a>
        </div>

        <!-- Full View Table -->
        <div class="full-view-container">
            <!-- Header Row -->
            <div class="row-container header">
                <div class="cell">Room No.</div>
                <div class="cell">Check-In Date</div>
                <div class="cell">Check-Out Date</div>
            </div>

            <!-- Room Data Row -->
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <div class="row-container">
                        <div class="cell"><?php echo $row['roomNo']; ?></div>
                        <div class="cell"><?php echo $row['checkIn']; ?></div>
                        <div class="cell"><?php echo $row['checkOut'] ? $row['checkOut'] : "N/A"; ?></div>
                    </div>

                    <div class="row-container header">
                        <div class="cell">Pending Payment Status</div>
                        <div class="cell">Next Payment Date</div>
                        <div class="cell">Request Service?</div>
                        <div class="cell">Service Status</div> <!-- New Column for Status -->
                    </div>

                    <div class="row-container">
                        <div class="cell"><?php echo $row['pendingPayment']; ?></div>
                        <div class="cell"><?php echo $row['nextPayment']; ?></div>
                        <div class="cell">
                            <!-- Request Service button triggers the service request -->
                            <button class="edit-button" onclick="sendServiceRequest('<?php echo $row['roomNo']; ?>')">Request Service</button>
                        </div>
                        <div class="cell status-<?php echo $row['roomNo']; ?>"><?php echo $row['requestService'] == 'YES' ? 'Service Requested' : 'Pending'; ?></div> <!-- Display Status -->
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="row-container">
                    <div class="cell" colspan="4">No details available for this room.</div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="guestRooms.js" defer></script>
</body>
</html>
