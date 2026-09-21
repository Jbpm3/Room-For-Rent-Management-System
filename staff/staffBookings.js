
let selectedId = null;

function openModal(id) {
    selectedId = id;
    document.getElementById('statusModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('statusModal').style.display = 'none';
}

function updateBooking(id, newStatus) {
    fetch('updateBooking.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `id=${encodeURIComponent(id)}&status=${encodeURIComponent(newStatus)}`
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        location.reload(); // Reload to show updated status
    })
    .catch(error => console.error('Error:', error));
}

