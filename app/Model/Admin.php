<?php
require_once('../../conn.php');

class Admin {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getUserByUsername($username) {
        $stmt = $this->conn->prepare("SELECT * FROM admin WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
?>

