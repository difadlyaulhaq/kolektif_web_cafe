<?php
include("config.php");

$db = $conn;

$query = "
    SELECT p.id_pesanan, p.no_pesanan, p.qty, p.note, p.status, m.nama AS menu_name, m.harga 
    FROM pesanan p 
    JOIN menu m ON p.id_menu = m.id_menu 
    ORDER BY p.id_pesanan DESC
";
$result = $db->query($query);

$orders = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }
} else {
    $orders = "No recent orders found";
}

echo json_encode($orders);
?>
