<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $no_pesanan = $_POST['no_pesanan'];
    $qty = $_POST['qty'];
    $note = $_POST['note'];
    $status = $_POST['status'];
    $id_menu = $_POST['subject'];

    $sql = "INSERT INTO pesanan(no_pesanan, qty, note, status, id_menu) VALUES ('$no_pesanan', '$qty', '$note', '$status', '$id_menu')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>window.location.href='menu.php?status=success'</script>";
    } else {
        echo "<script>window.location.href='menu.php?status=failed'</script>";
    }

    $conn->close();
}
?>