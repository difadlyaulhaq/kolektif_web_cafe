<?php
session_start();
require 'config.php'; // Menghubungkan ke database

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $_POST['email'];

    // Cek apakah email ada di database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        $codes = [1234, 5678, 9012, 3456, 7890];
        $code = $codes[array_rand($codes)];
        $_SESSION['code'] = $code; // Menyimpan kode di session

        $updateStmt = $pdo->prepare("UPDATE users SET reset_code = ? WHERE email = ?");
        $updateStmt->execute([$code, $email]);

        // Redirect ke halaman verifikasi kode
        header('Location: 3. enter_code_verification.html');
        exit;
    } else {
        echo 'Email not found.';
    }
}
?>
