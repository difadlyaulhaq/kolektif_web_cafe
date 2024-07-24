<?php
include 'config.php'; // Include your database connection

function fetchReservations() {
    global $conn;
    $sql = "SELECT room_id, reserver, no_telp, durasi, harga, status FROM reservation";
    $result = $conn->query($sql);

    $reservations = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $reservations[] = $row;
        }
    }
    return $reservations;
}
?>
