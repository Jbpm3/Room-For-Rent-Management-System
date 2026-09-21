<?php
// DB connection
$conn = new mysqli("localhost", "s24100596_magsipoc_residences", "24100596", "s24100596_magsipoc_residences");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function getRoomData($roomNo) {
    global $conn;

    $statusQuery = "SELECT statusUpdate FROM roomStatus WHERE roomNo = ?";
    $feedbackQuery = "SELECT feedback FROM feedback WHERE roomNo = ?";
    $taskQuery = "SELECT task FROM roomTasks WHERE roomNo = ?";

    $statusUpdate = null;
    $feedback = null;
    $task = null;

    if ($stmt1 = $conn->prepare($statusQuery)) {
        $stmt1->bind_param("i", $roomNo);
        $stmt1->execute();
        $stmt1->bind_result($statusUpdate);
        $stmt1->fetch();
        $stmt1->close();
    }

    if ($stmt2 = $conn->prepare($feedbackQuery)) {
        $stmt2->bind_param("i", $roomNo);
        $stmt2->execute();
        $stmt2->bind_result($feedback);
        $stmt2->fetch();
        $stmt2->close();
    }

    if ($stmt3 = $conn->prepare($taskQuery)) {
        $stmt3->bind_param("i", $roomNo);
        $stmt3->execute();
        $stmt3->bind_result($task);
        $stmt3->fetch();
        $stmt3->close();
    }

    return [
        'status' => $statusUpdate ?? 'No status available',
        'feedback' => $feedback ?? 'No feedback available',
        'task' => $task ?? 'No task available'
    ];
}
?>
