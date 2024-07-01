<?php
require 'config.php';

$sql = "SELECT * FROM menu";
$result = $conn->query($sql);

$menus = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $menus[] = $row;
    }
} else {
    echo "0 results";
}

$conn->close();
?>
