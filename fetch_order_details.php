<?php
include 'config.php';

$order_no = $_GET['order_no'];

$sql = "SELECT * FROM pesanan WHERE no_pesanan = '$order_no'";
$result = $conn->query($sql);

$order_details = array();
while($row = $result->fetch_assoc()) {
    $order_details[] = $row;
}

echo json_encode($order_details);

$conn->close();
?>
