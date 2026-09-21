document.addEventListener("DOMContentLoaded", () => {
    showSlides();
});

const rooms = [
    { img: "../rooms/room1.jpg", type: "Single Room", availability: "Available", number: 1 },
    { img: "../rooms/room2.jpg", type: "Double Room", availability: "Fully Booked", number: 2 },
    { img: "../rooms/room3.jpg", type: "Studio Room", availability: "Available", number: 3 },
    { img: "../rooms/room4.jpg", type: "Deluxe Suite", availability: "Limited", number: 4 },
    { img: "../rooms/room5.jpg", type: "Family Room", availability: "Available", number: 5 },
    { img: "../rooms/room6.jpg", type: "Penthouse", availability: "Fully Booked", number: 6 },
    { img: "../rooms/room7.jpg", type: "Single Room", availability: "Available", number: 7 },
    { img: "../rooms/room8.jpg", type: "Double Room", availability: "Fully Booked", number: 8 },
    { img: "../rooms/room9.jpg", type: "Studio Room", availability: "Available", number: 9 },
    { img: "../rooms/room10.jpg", type: "Deluxe Suite", availability: "Limited", number: 10 },
    { img: "../rooms/room11.jpg", type: "Family Room", availability: "Available", number: 11 },
    { img: "../rooms/room12.jpg", type: "Penthouse", availability: "Fully Booked", number: 12 },
    { img: "../rooms/room13.jpg", type: "Deluxe Suite", availability: "Limited", number: 13 },
    { img: "../rooms/room14.jpg", type: "Family Room", availability: "Available", number: 14 },
    { img: "../rooms/room15.jpg", type: "Penthouse", availability: "Fully Booked", number: 15 },
];

let index = 0;

function showSlides() {
    const room = rooms[index]; // Get current room data

    // Update image and room number
    document.querySelector(".slide img").src = room.img;
    document.getElementById("roomNumberHeader").innerText = `Room ${room.number}`;

    // Fetch data from the server
    const roomNo = room.number; // Directly use the room number
    fetch(`getRoomData.php?roomNo=${roomNo}`)
    .then(response => {
        console.log(response); // Log the response object
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.json();
    })
    .then(data => {
        console.log(data); // Log the data for debugging
        document.getElementById("roomStatus").innerText = data.status || "No status available";
        document.getElementById("feedback").innerText = data.feedback || "No feedback available";
        document.getElementById("status").innerText = data.task || "No task available";
    })
    .catch(error => console.error('Error fetching room data:', error));
}

function nextSlide() {
    index = (index + 1) % rooms.length; // Move to the next room
    showSlides(); // Show the updated slide
}

function prevSlide() {
    index = (index - 1 + rooms.length) % rooms.length; // Move to the previous room
    showSlides(); // Show the updated slide
}