<?php
$DB_HOST = "localhost";
$DB_USER = "root";
$DB_PASS = "";
$DB_NAME = "dbkopi";
$DB_PORT = "3306";
$conn = new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME,$DB_PORT);

if (!$conn){
    echo "Koneksi gagal";
}
else{
    echo "koneksi berhasil";
}
?>
