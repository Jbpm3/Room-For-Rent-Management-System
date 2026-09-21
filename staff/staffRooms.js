document.addEventListener('DOMContentLoaded', function() {
    const editButtons = document.querySelectorAll('.edit-button');

    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            const statusCell = this.parentElement.previousElementSibling;
            const currentStatus = statusCell.textContent.trim();
            const roomNo = this.parentElement.parentElement.firstElementChild.textContent.trim();

            // Create a modal for status selection
            const modal = document.createElement('div');
            modal.classList.add('modal');
            modal.innerHTML = `
                <div class="modal-content">
                    <span class="close-button">&times;</span>
                    <h2>Change Status for Room ${roomNo}</h2>
                    <button class="status-button" data-status="occupied">Occupied</button>
                    <button class="status-button" data-status="vacant">Vacant</button>
                </div>
            `;
            document.body.appendChild(modal);

            // Close button functionality
            modal.querySelector('.close-button').addEventListener('click', function() {
                modal.remove();
            });

            // Status button functionality
            modal.querySelectorAll('.status-button').forEach(statusButton => {
                statusButton.addEventListener('click', function() {
                    const newStatus = this.getAttribute('data-status');
                    statusCell.textContent = newStatus;

                    // Send AJAX request to update the database
                    fetch('updateStatus.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            roomNo: roomNo,
                            statusUpdate: newStatus
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data.message);
                        if (data.message !== "Status updated successfully.") {
                            alert(data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert("An error occurred while updating the status.");
                    });

                    // Remove modal after selection
                    modal.remove();
                });
            });
        });
    });
});