<?php
include("config.php");

$db = $conn;
$order_id = $_GET['id'];

$query = "
    SELECT p.id_pesanan, p.no_pesanan, p.qty, p.note, p.status, m.nama AS menu_name, m.harga 
    FROM pesanan p 
    JOIN menu m ON p.id_menu = m.id_menu 
    WHERE p.id_pesanan = ?
";

$stmt = $db->prepare($query);
$stmt->bind_param("i", $order_id);
$stmt->execute();
$result = $stmt->get_result();

$order_details = [];

if ($result->num_rows > 0) {
    $order_details = $result->fetch_assoc();
} else {
    $order_details = "Order details not found";
}

echo json_encode($order_details);
?>
