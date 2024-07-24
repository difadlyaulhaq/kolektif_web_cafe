<?php
include 'db.php';

$nota_num = $_POST['nota_num'];
$cust_name = $_POST['cust_name'];
$admin = $_POST['admin'];
$room_type = $_POST['room_type'];
$date = $_POST['date'];
$session = $_POST['session'];
$status = $_POST['status'];

$sql = "INSERT INTO reservations (nota_num, cust_name, admin, room_type, date, session, status) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $nota_num, $cust_name, $admin, $room_type, $date, $session, $status);

if ($stmt->execute()) {
    echo "Reservation created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
