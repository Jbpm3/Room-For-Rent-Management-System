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

let paymentData = [];

function showSlides() {
    for (let i = 0; i < 1; i++) { // Displaying 1 room at a time
        let roomIndex = (index + i) % rooms.length;
        const room = rooms[roomIndex];

        // Update image and basic room info
        document.getElementById(`room1`).src = room.img;
        document.getElementById(`roomNumberHeader`).innerText = `ROOM ${roomIndex + 1}`;

        // Find corresponding payment data
        const roomPayment = paymentData.find(p => p.roomNo == (roomIndex + 1));
        document.getElementById("pending-payment1").innerText =
            roomPayment ? `₱${roomPayment.pendingPayment}` : "Pending: N/A";
        document.getElementById("paid-status1").innerText =
            roomPayment ? roomPayment.paidStatus : "Status: N/A";
    }
}

function fetchPaymentData() {
    fetch("getPaymentData.php")
        .then(response => response.json())
        .then(data => {
            paymentData = data;
            showSlides();
        })
        .catch(error => console.error("Error fetching payment data:", error));
}

function nextSlide() {
    index = (index + 1) % rooms.length;
    showSlides();
}

function prevSlide() {
    index = (index - 1 + rooms.length) % rooms.length;
    showSlides();
}

document.addEventListener("DOMContentLoaded", fetchPaymentData);
// Ensure script runs after DOM is loaded
document.addEventListener("DOMContentLoaded", showSlides);