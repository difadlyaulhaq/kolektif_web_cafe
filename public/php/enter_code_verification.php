<?php
session_start();
require 'config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['code'])) {
    $code = $_POST['code'];

    // Cek apakah kode sesuai dengan yang ada di session
    if ($code == $_SESSION['code']) {
        // Redirect ke halaman reset password
        header('Location: 4. enter_new_password.html');
        exit;
    } else {
        echo 'Verification code is incorrect.';
    }
}
?>
