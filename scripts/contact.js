const rooms = [
    { img: "rooms/room1.jpg", type: "Single Room"},
    { img: "rooms/room2.jpg", type: "Double Room" },
    { img: "rooms/room3.jpg", type: "Studio Room"},
    { img: "rooms/room4.jpg", type: "Deluxe Suite"},
    { img: "rooms/room5.jpg", type: "Family Room"},
    { img: "rooms/room6.jpg", type: "Penthouse"},
    { img: "rooms/room7.jpg", type: "Single Room"},
    { img: "rooms/room8.jpg", type: "Double Room"},
    { img: "rooms/room9.jpg", type: "Studio Room"},
    { img: "rooms/room10.jpg", type: "Deluxe Suite"},
    { img: "rooms/room11.jpg", type: "Family Room"},
    { img: "rooms/room12.jpg", type: "Penthouse"},
    { img: "rooms/room13.jpg", type: "Deluxe Suite"},
    { img: "rooms/room14.jpg", type: "Family Room"},
    { img: "rooms/room15.jpg", type: "Penthouse"}
];

let index = 0;

function showSlides() {
    for (let i = 0; i < 3; i++) {
        const roomData = rooms[(index + i) % rooms.length];
        const imgEl = document.getElementById(`room${i + 1}`);
        const typeEl = document.getElementById(`type${i + 1}`);

        if (imgEl && typeEl) {
            imgEl.src = roomData.img;
            typeEl.textContent = roomData.type;
        }
    }
}

function nextSlide() {
    index = (index + 3) % rooms.length;
    showSlides();
}

function prevSlide() {
    index = (index - 3 + rooms.length) % rooms.length;
    showSlides();
}

document.addEventListener("DOMContentLoaded", showSlides);
