<?php
require 'config.php'; // Menghubungkan ke database

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['password']) && isset($_POST['confirmPassword'])) {
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Cek apakah password dan konfirmasi password sesuai
    if ($password === $confirmPassword && strlen($password) >= 8) {
        // Hash password baru
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Update password di database
        $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE reset_code = ?");
        $stmt->execute([$hashedPassword, $_SESSION['code']]);

        echo 'Password has been reset successfully!';
        // Redirect ke halaman login
        header('Location: login.html');
        exit();
    } else {
        echo 'Passwords do not match or are not long enough.';
    }
}
?>
