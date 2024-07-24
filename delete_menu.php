<?php
require 'config.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus gambar dari server
    $result = $conn->query("SELECT path_gambar FROM menu WHERE id_menu = $id");
    $row = $result->fetch_assoc();
    $imagePath = $row['path_gambar'];

    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    // Hapus entri terkait di tabel pesanan dan billing
    $conn->query("DELETE FROM billing WHERE id_menu = $id");
    $conn->query("DELETE FROM pesanan WHERE id_menu = $id");

    // Hapus menu dari tabel menu
    $sql = "DELETE FROM menu WHERE id_menu = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: menu.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid ID";
}

$conn->close();
?>
