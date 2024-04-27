<head>
    <title>Home</title>
</head>
<body>
    <h1>Ini Home</h1>
    <?php if(isset($_SESSION['username'])): ?>
        <h1 class="text-xl text-red-200">Selamat datang, <?php echo $_SESSION['username']; ?></h1>
        <p><a href="logout.php">Logout</a></p>
    <?php else: ?>
        <p>Silakan login untuk mengakses halaman admin:</p>
        <form action="login" method="post">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username"><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password"><br><br>
            <input type="submit" value="Login">
        </form>
    <?php endif; ?>
</body>
</html>
