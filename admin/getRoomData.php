<?php
header('Content-Type: application/json');
include_once('roomFunctions.php'); // only the logic, no HTML

if (isset($_GET['roomNo'])) {
    $roomNo = intval($_GET['roomNo']);
    $roomData = getRoomData($roomNo);
    echo json_encode($roomData);
} else {
    echo json_encode([
        'status' => 'Error',
        'feedback' => 'No room number provided',
        'task' => ''
    ]);
}
?>
