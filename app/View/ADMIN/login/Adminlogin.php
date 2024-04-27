<?php
var_dump($_SESSION);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="login" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>

    <!-- Tampilkan pesan error jika login gagal -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($error_message)) {
        echo '<p style="color: red;">' . $error_message . '</p>';
    }
    ?>

    <p>Belum punya akun? <a href="register.php">Registrasi</a></p>
</body>
</html>
