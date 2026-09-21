<?php
// Start the session to retrieve the roomNo
session_start();

// Database connection
$conn = new mysqli("localhost", "s24100596_magsipoc_residences", "24100596", "s24100596_magsipoc_residences");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user is logged in and has a roomNo
if (!isset($_SESSION['room'])) {
    die("Room number not set. Please log in.");
}

// Get the roomNo from session
$roomNo = str_replace("room", "", $_SESSION['room']); // Assuming the room number is stored in the session

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['feedback'])) {
    // Get the feedback from the form input
    $feedback = $_POST['feedback'];

    // Insert the feedback along with roomNo into the database
    $stmt = $conn->prepare("INSERT INTO feedback (roomNo, feedback) VALUES (?, ?)");
    $stmt->bind_param("ss", $roomNo, $feedback);  // "ss" indicates two string parameters

    if ($stmt->execute()) {
        $successMessage = "Feedback submitted successfully!";
    } else {
        $errorMessage = "Error submitting feedback: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Fetch all feedback from the database
$sql = "SELECT roomNo, feedback FROM feedback";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Feedback</title>
    <link rel="stylesheet" href="guestFeedback.css">
    <script src="adminRooms.js" defer></script>
</head>
<body>

    <!-- Header -->
    <?php include_once('../include/userHeaderGuest.php') ?>

    <!-- Main Container -->
    <div class="container">
        
        <!-- Navigation Button -->
        <div class="button-container">
            <a href="guest.php"><div class="button">Back to My Room</div></a>
        </div>

        <p class="feedback-text">Leave your feedback here</p>

        <!-- Feedback Form -->
        <form action="" method="post">
            <input type="text" placeholder="Enter Feedback Here" name="feedback" id="feedBack" required>
            <br>
            <button type="submit" class="submit-button">Submit</button>
        </form>
    </div>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>