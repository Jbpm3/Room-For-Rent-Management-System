<?php
include_once('roomFunctions.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Rooms</title>
    <link rel="stylesheet" href="adminRooms.css">
    <script src="adminRooms.js" defer></script>
</head>
<body>
<?php include_once('../include/userHeaderAdmin.php') ?>
    <div class="container">
        <div class="button-container">
            <a href="admin.php"><div class="button">Rooms</div></a>
            <div class="roomNumber" id="roomNumberHeader">ROOM NUMBER</div>
        </div>
        
        <div class="img-container">
            <button class="prev" onclick="prevSlide()">&#10094;</button>
            <div class="slides">
                <div class="slide">
                    <img id="roomImage" src="../rooms/room1.jpg" alt="Room Image">
                    <div class="details-section">
                        <div id="roomStatus" class="roomStatus">Room Status</div>
                        <div id="feedback" class="feedBack">Feedback</div>
                        <div id="status" class="status">Status</div>
                    </div>
                </div>
            </div>
            <button class="next" onclick="nextSlide()">&#10095;</button>
        </div>
    </div>
</body>
</html>