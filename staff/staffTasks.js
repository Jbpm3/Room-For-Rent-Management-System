document.addEventListener('DOMContentLoaded', function() {
    const editButtons = document.querySelectorAll('.edit-button');
    const modal = document.getElementById('taskModal');
    const closeModal = document.querySelector('.close');
    let selectedRoomNo;

    // Hide modal by default
    modal.style.display = 'none';

    // Open modal when edit button is clicked
    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            selectedRoomNo = this.getAttribute('data-roomno');
            modal.style.display = 'block';
        });
    });

    // Close modal when close button is clicked
    closeModal.onclick = function() {
        modal.style.display = 'none';
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }

    // Handle task selection inside modal
    const taskButtons = document.querySelectorAll('.task-button');
    taskButtons.forEach(button => {
        button.addEventListener('click', function() {
            const task = this.getAttribute('data-task');
            updateTask(selectedRoomNo, task);
            modal.style.display = 'none';
        });
    });

    // Update task function
    function updateTask(roomNo, task) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "updateTask.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert("Task updated successfully!");
                location.reload(); // Reload the page to see the changes
            }
        };
        xhr.send("roomNo=" + roomNo + "&task=" + task);
    }
});