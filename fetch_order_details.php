<?php
include("config.php");

$order_id = intval($_GET['id']);
$query = "SELECT * FROM orders WHERE id = $order_id";
$result = $conn->query($query);

$order = [];
if ($result->num_rows > 0) {
    $order = $result->fetch_assoc();

    // Fetch order items
    $query_items = "SELECT * FROM order_items WHERE order_id = $order_id";
    $result_items = $conn->query($query_items);

    $order['items'] = [];
    if ($result_items->num_rows > 0) {
        while ($row = $result_items->fetch_assoc()) {
            $order['items'][] = $row;
        }
    }
}

echo json_encode($order);
?>
