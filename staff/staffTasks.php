<?php
$conn = new mysqli("localhost", "s24100596_magsipoc_residences", "24100596", "s24100596_magsipoc_residences"); 

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT roomNo, task FROM roomTasks";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Tasks</title>
    <link rel="stylesheet" href="staffTasks.css">
    <script src="staffTasks.js" defer></script>
</head>
<body>

    <!-- Header -->
    <?php include_once('../include/userHeaderStaff.php') ?>

    <!-- Main Container -->
    <div class="container">
        
        <!-- Navigation Button -->
        <div class="button-container">
            <a href="staff.php"><div class="button">Tasks/Maintenance</div></a>
        </div>

        <!-- Full View Table -->
        <div class="full-view-container">
            
            <!-- Header Row -->
            <div class="row-container header">
                <div class="cell">Task</div>
                <div class="cell">Room No.</div>
                <div class="cell">Update</div>
            </div>

            <!-- Data Rows -->
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="row-container">';
                    echo '<div class="cell">' . htmlspecialchars($row["task"]) . '</div>';
                    echo '<div class="cell">' . htmlspecialchars($row["roomNo"]) . '</div>';
                    echo '<div class="cell"><button class="edit-button" data-roomno="' . htmlspecialchars($row["roomNo"]) . '">Edit</button></div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="row-container"><div class="cell" colspan="3">No tasks found</div></div>';
            }
            $conn->close(); // Close the database connection
            ?>
        </div>
    </div>

    <!-- Modal for Task Selection -->
    <div id="taskModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Select Task</h2>
            <button class="task-button" data-task="Needs Cleaning">Needs Cleaning</button>
            <button class="task-button" data-task="Cleaned">Cleaned</button>
        </div>
    </div>

</body>
</html>