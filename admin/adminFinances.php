
<?php
echo '<link rel="stylesheet" href="admin.css">';
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Admin Finances</title>
        <link rel="stylesheet" href="adminFinances.css">
        <script src="adminFinances.js" defer></script>
    </head>
    <body>
    <?php include_once('../include/userHeaderAdmin.php') ?>
        <div class="container">
            <div class="button-container">
                <a href="admin.php"><div class="button">Financial Reports</div></a>
                <div class="roomNumber" id="roomNumberHeader"> ROOM NUMBER</div>
            </div>
            
            <div class="img-container">
            <button class="prev" onclick="prevSlide()">&#10094;</button>

            <div class="slides">
                <div class="slide">
                    <img id="room1" src="../rooms/room1.jpg">
                    <p id="pending-payment1" class="pending-payment">PENDING PAYMENT </p>
                    <p id="paid-status1" class="paid-status">PAID STATUS</p>
                </div>
        
            </div>
           

            <button class="next" onclick="nextSlide()">&#10095;</button>

        </div>
        </div>
    </body>
</html>

