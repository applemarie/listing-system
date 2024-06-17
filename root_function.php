<?php


class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "oop_php";
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        $this->conn->close();
    }

    public function insertProduct($userId, $image, $product, $price, $description, $location) {
        $stmt = $this->conn->prepare("INSERT INTO product_sell (user_id, image, product, price, description, location) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssss", $userId, $image, $product, $price, $description, $location);
        
        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error: " . $stmt->error;
            return false;
        }
    }
}

?>
