// Function to send service request
function sendServiceRequest(roomNo) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "submit_service_request.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function() {
        if (xhr.status === 200) {
            alert("Service Requested");

            // Update the status in the table
            var statusCell = document.querySelector(".status-" + roomNo);
            if (statusCell) {
                statusCell.textContent = "Service Requested"; // Update the status in the table
            }
        } else {
            alert("Error submitting request");
        }
    };

    // Send the data to the server
    var data = "roomNo=" + roomNo + "&requestService=YES";
    xhr.send(data);
}
