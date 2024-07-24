<?php
include("config.php");

$order_id = intval($_POST['id']);
$query = "UPDATE orders SET status = 'Completed' WHERE id = $order_id";

if ($conn->query($query) === TRUE) {
    echo "Order status updated successfully.";
} else {
    echo "Error updating order status: " . $conn->error;
}
?>
