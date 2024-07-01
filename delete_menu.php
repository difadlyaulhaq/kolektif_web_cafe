<?php
require 'config.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus gambar dari server
    $result = $conn->query("SELECT path_gambar FROM menu WHERE id_menu=$id");
    $menu = $result->fetch_assoc();
    if ($menu && file_exists($menu['path_gambar'])) {
        unlink($menu['path_gambar']);
    }

    // Hapus data dari database
    $sql = "DELETE FROM menu WHERE id_menu=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>window.location.href='menu.php?status=success'</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid ID";
}

$conn->close();
?>
