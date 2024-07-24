<?php
include 'config.php';

$sql = "SELECT p.no_pesanan, c.name as cust_name, op.name as cashier, p.type, p.status
        FROM pesanan p
        JOIN customers c ON p.cust_id = c.id
        JOIN operators op ON p.op_id = op.id
        ORDER BY p.id_pesanan DESC
        LIMIT 5";

$result = $conn->query($sql);

$orders = array();
while($row = $result->fetch_assoc()) {
    $orders[] = $row;
}

echo json_encode($orders);

$conn->close();
?>
