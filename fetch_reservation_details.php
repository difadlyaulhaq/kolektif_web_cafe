<?php
include 'config     .php'; // Include your database connection

if (isset($_GET['room_id'])) {
    $room_id = $_GET['room_id'];

    $sql = "SELECT room_id, reserver, no_telp, durasi, harga, status FROM reservation WHERE room_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $room_id);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            echo json_encode($result->fetch_assoc());
        } else {
            echo json_encode(["error" => "Reservation not found"]);
        }
    } else {
        echo json_encode(["error" => $stmt->error]);
    }

    $stmt->close();
    $conn->close();
}
?>
