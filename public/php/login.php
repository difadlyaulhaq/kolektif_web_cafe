<?php
require 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek di database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // Verifikasi password
    if ($user && password_verify($password, $user['password'])) {
        echo 'Login berhasil!';
        // Redirect ke halaman yang diinginkan
        header("Location: dashboard.php");
        exit();
    } else {
        echo 'Login gagal!';
    }
}
?>
