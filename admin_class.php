<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "oop_php"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

class Database {
    public $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }
}

$db = new Database($conn);

class Admin {
    private $db;

    public function __construct($db) {
        $this->db = $db->conn;
        $this->checkAdmin();
    }

    private function checkAdmin() {
        if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
            header("Location: login_form.php");
            exit();
        }
    }

    public function deleteUser($id) {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        if ($stmt === false) {
            return "Prepare failed: " . htmlspecialchars($this->db->error);
        }
        
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            return "User deleted successfully.";
        } else {
            return "Error: " . htmlspecialchars($stmt->error);
        }
    }

    public function getUsers() {
        $result = $this->db->query("SELECT id, username, image, role FROM users");
        if ($result === false) {
            return "Query failed: " . htmlspecialchars($this->db->error);
        }
        
        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        return $users;
    }
}

$admin = new Admin($db);

if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $message = $admin->deleteUser($delete_id);
    echo "<script>alert('$message');</script>";
    header("Location: admin_page.php");
    exit();
}

$users = $admin->getUsers();
if (is_string($users)) {
    echo "<script>alert('$users');</script>";
    exit();
}
?>