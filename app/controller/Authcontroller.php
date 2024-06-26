<?php

// require_once('../model/Admin.php');

class AuthController {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
        
        // Check if the request is for the login page
        if ($_SERVER["REQUEST_URI"] == "/login") {
            $this->login();
        }
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];
            // Cek apakah username dan password ada di database
            // $adminModel = new Admin($this->conn);
            // $user = $adminModel->getUserByUsername($username);

            // if ($user && password_verify($password, $user["password"])) {
            if($username == "admin" && $password == "admin"){
                // Jika login berhasil, set session dan redirect ke halaman dashboard
                session_start();
                // $_SESSION["user_id"] = $user["id_admin"];
                $_SESSION["username"] = "DIFA";
                // $_SESSION["nama"] = $user["nama"];
                // $_SESSION["peran"] = $user["peran"];

                header("Location: home");
                exit();
            } else {
                // Jika login gagal, tampilkan pesan error
                echo "Username atau password salah.";
            }
        }
    }

    public function logout() {
        // Hapus session dan redirect ke halaman login
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../view/ADMIN/login/AdminLogin.php");
        exit();
    }
}
