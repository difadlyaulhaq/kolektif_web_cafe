<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $jenis = $_POST['jenis'];
    
    
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["menu_image"]["name"]);
    move_uploaded_file($_FILES["menu_image"]["tmp_name"], $target_file);

    $sql = "INSERT INTO menu (nama, deskripsi, harga, path_gambar, jenis) VALUES ('$nama', '$deskripsi', $harga, '$target_file', '$jenis')";

    if ($conn->query($sql) === TRUE) {  
        echo "<script>window.location.href='menu.php?status=success'</script>";
    } else {
        echo "<script>window.location.href='menu.php?status=failed'</script>";
    }

    $conn->close();
}
?>
