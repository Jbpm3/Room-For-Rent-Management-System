<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'guest') {
    header("Location: ../login.php");
    exit();
}

$room = $_SESSION['room']; // Retrieve the room number or name from session
echo '<link rel="stylesheet" href="css/staff.css">';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="guest.css">
    <title>Guest Dashboard</title>
</head>
<body>

<!-- Header -->
<?php include_once('../include/userHeaderGuest.php'); ?>

<!-- Body -->
<div class="container">
    <div class="buttons">
        <a href="guestRoom.php"><div class="button">My Room</div></a>
        <a href="guestFeedback.php"><div class="button">Feedback</div></a>
    </div>
</div>
</body>
</html>