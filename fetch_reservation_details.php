<?php
include 'config.php';

$room_id = $_GET['room_id'];

$sql = "SELECT * FROM reservation WHERE room_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $room_id);
$stmt->execute();
$result = $stmt->get_result();

$reservation = $result->fetch_assoc();

if ($reservation) {
    echo json_encode($reservation);
} else {
    echo json_encode(array('error' => 'No reservation found'));
}

$stmt->close();
$conn->close();
?>
