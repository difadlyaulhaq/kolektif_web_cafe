<?php
include 'config.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $room_id = $_POST['room_id'];
    $reserver = $_POST['reserver'];
    $no_telp = $_POST['no_telp'];
    $durasi = $_POST['durasi'];
    $harga = $_POST['harga'];
    $status = $_POST['status'];

    $sql = "INSERT INTO reservation (room_id, reserver, no_telp, durasi, harga, status) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssis", $room_id, $reserver, $no_telp, $durasi, $harga, $status);

    if ($stmt->execute()) {
        echo "<p class='text-green-600'>Reservation created successfully</p>";
    } else {
        echo "<p class='text-red-600'>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $conn->close();
}
?>
