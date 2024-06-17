<?php

include ('/Wamp/wamp64/www/auth.php');


class Product {
    private $db;

    public function __construct($db) {
        $this->db = $db->getConnection();
    }

    public function deleteProduct($id) {
        $stmt = $this->db->prepare("DELETE FROM product_sell WHERE id = ?");
        if ($stmt === false) {
            return "Prepare failed: " . htmlspecialchars($this->db->error);
        }
        
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            return "Product deleted successfully.";
        } else {
            return "Error: " . htmlspecialchars($stmt->error);
        }
    }

    public function getProductsByUserId($user_id) {
        $stmt = $this->db->prepare("SELECT id, product, price FROM product_sell WHERE user_id = ?");
        if ($stmt === false) {
            return "Prepare failed: " . htmlspecialchars($this->db->error);
        }

        $stmt->bind_param("i", $user_id);
        if (!$stmt->execute()) {
            return "Execute failed: " . htmlspecialchars($stmt->error);
        }

        $result = $stmt->get_result();
        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
        return $products;
    }
}
?>
