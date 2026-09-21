const rooms = [
    { img: "../rooms/room1.jpg", type: "Single Room", availability: "Available" },
    { img: "../rooms/room2.jpg", type: "Double Room", availability: "Fully Booked" },
    { img: "../rooms/room3.jpg", type: "Studio Room", availability: "Available" },
    { img: "../rooms/room4.jpg", type: "Deluxe Suite", availability: "Limited" },
    { img: "../rooms/room5.jpg", type: "Family Room", availability: "Available" },
    { img: "../rooms/room6.jpg", type: "Penthouse", availability: "Fully Booked" },
    { img: "../rooms/room7.jpg", type: "Single Room", availability: "Available" },
    { img: "../rooms/room8.jpg", type: "Double Room", availability: "Fully Booked" },
    { img: "../rooms/room9.jpg", type: "Studio Room", availability: "Available" },
    { img: "../rooms/room10.jpg", type: "Deluxe Suite", availability: "Limited" },
    { img: "../rooms/room11.jpg", type: "Family Room", availability: "Available" },
    { img: "../rooms/room12.jpg", type: "Penthouse", availability: "Fully Booked" },
    { img: "../rooms/room13.jpg", type: "Deluxe Suite", availability: "Limited" },
    { img: "../rooms/room14.jpg", type: "Family Room", availability: "Available" },
    { img: "../rooms/room15.jpg", type: "Penthouse", availability: "Fully Booked" }
];

let index = 0;

function showSlides() {
    for (let i = 0; i < 3; i++) {
        let roomIndex = (index + i) % rooms.length; // Wrap around using modulo
        document.getElementById(`room${i + 1}`).src = rooms[roomIndex].img;
        document.getElementById(`type${i + 1}`).innerText = rooms[roomIndex].type;
        document.getElementById(`available${i + 1}`).innerText = rooms[roomIndex].availability;
    }
}

function nextSlide() {
    index = (index + 1) % rooms.length; // Increment index and wrap around
    showSlides();
}

function prevSlide() {
    index = (index - 1 + rooms.length) % rooms.length; // Decrement index and wrap around
    showSlides();
}

// Ensure script runs after DOM is loaded
document.addEventListener("DOMContentLoaded", showSlides);