<?php
include 'config.php';

$order_no = $_POST['order_no'];
$status = $_POST['status'];

$sql = "UPDATE pesanan SET status = '$status' WHERE no_pesanan = '$order_no'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
