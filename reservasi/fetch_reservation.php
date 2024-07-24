<?php
include 'db.php';

$sql = "SELECT * FROM reservations ORDER BY date DESC";
$result = $conn->query($sql);

$reservations = array();
while ($row = $result->fetch_assoc()) {
    $reservations[] = $row;
}

echo json_encode($reservations);
?>
