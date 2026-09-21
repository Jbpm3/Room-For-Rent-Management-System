<?php
$conn = new mysqli("localhost", "s24100596_magsipoc_residences", "24100596", "s24100596_magsipoc_residences"); 

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $roomNo = $_POST['roomNo'];
    $task = $_POST['task'];

    $stmt = $conn->prepare("UPDATE roomTasks SET task = ? WHERE roomNo = ?");
    $stmt->bind_param("ss", $task, $roomNo);

    if ($stmt->execute()) {
        echo "Task updated successfully";
    } else {
        echo "Error updating task: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>