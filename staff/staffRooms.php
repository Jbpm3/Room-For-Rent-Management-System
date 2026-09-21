<?php
$conn = new mysqli("localhost", "s24100596_magsipoc_residences", "24100596", "s24100596_magsipoc_residences"); 

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT roomNo, statusUpdate FROM roomStatus";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Rooms</title>
    <link rel="stylesheet" href="staffRooms.css">
    <script src="staffRooms.js" defer></script>
</head>
<body>

    <!-- Header -->
    <?php include_once('../include/userHeaderStaff.php') ?>

    <!-- Main Container -->
    <div class="container">
        
        <!-- Navigation Button -->
        <div class="button-container">
            <a href="staff.php"><div class="button">Rooms</div></a>
        </div>

        <!-- Full View Table -->
        <div class="full-view-container">
            
            <!-- Header Row -->
            <div class="row-container header">
                <div class="cell">Room #</div>
                <div class="cell">Status</div>
                <div class="cell">Update</div>
            </div>

            <!-- Data Rows -->
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<div class="row-container">';
                    echo '<div class="cell">' . htmlspecialchars($row["roomNo"]) . '</div>';
                    echo '<div class="cell">' . htmlspecialchars($row["statusUpdate"]) . '</div>';
                    echo '<div class="cell"><button class="edit-button">Edit</button></div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="row-container"><div class="cell" colspan="3">No rooms found</div></div>';
            }
            $conn->close(); // Close the database connection
            ?>
        </div>
    </div>

</body>
</html>