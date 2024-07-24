<?php
include 'config.php';

$sql = "SELECT * FROM reservation";
$result = $conn->query($sql);

$reservations = array();
while ($row = $result->fetch_assoc()) {
    $reservations[] = $row;
}

echo json_encode($reservations);

$result->close();
$conn->close();
?>
