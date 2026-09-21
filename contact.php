<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Magsipoc Residences - Rooms</title>
    <link rel="stylesheet" href="css/contact.css" />
    <script src="scripts/contact.js" defer></script>
</head>
<body>
    <div class="container">
        <?php include_once realpath('include/header.php') ?>
    </div>

    <div class="img-container" aria-label="Room slideshow" role="region">
        <button class="prev" aria-label="Previous slide" onclick="prevSlide()">&#10094;</button>

        <div class="slides">
            <div class="slide active" aria-hidden="false">
                <img id="room1" src="rooms/room1.jpg" alt="Image of Single Room" />
                <p id="type1" class="room-type">Single Room</p>
            </div>
        
            <div class="slide" aria-hidden="true">
                <img id="room2" src="rooms/room2.jpg" alt="Image of Double Room" />
                <p id="type2" class="room-type">Double Room</p>
            </div>
        
            <div class="slide" aria-hidden="true">
                <img id="room3" src="rooms/room3.jpg" alt="Image of Studio Room" />
                <p id="type3" class="room-type">Studio Room</p>
            </div>
        </div>

        <button class="next" aria-label="Next slide" onclick="nextSlide()">&#10095;</button>
    </div>

    <footer>
        <div class="number">
            <p>CONTACT #: 344-4427</p>
        </div>
    </footer>
</body>
</html>
