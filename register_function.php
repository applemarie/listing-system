<?php
include('config.php');

class UserRegistration {
    private $conn;

    public function __construct($db_connection) {
        $this->conn = $db_connection;
    }

    public function registerUser($image, $username, $password, $role, $email) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->conn->prepare("INSERT INTO users (image, username, password, role, email) VALUES (?, ?, ?, ?, ?)");

        if ($stmt === false) {
            return "Error preparing statement: " . $this->conn->error;
        }

        if (!$stmt->bind_param("sssss", $image, $username, $hashed_password, $role, $email)) {
            return "Error binding parameters: " . $stmt->error;
        }

        if ($stmt->execute()) {
            return true;
        } else {
            return "Error executing statement: " . $stmt->error;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $image      = $_FILES['image']['name'];
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    $role       = $_POST['role'];
    $email      = $_POST['email'];

    $target = "upload_profile/" . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {

        $userRegistration = new UserRegistration($conn);
        $result = $userRegistration->registerUser($image, $username, $password, $role, $email);

        if ($result === true) {
            header("Location: login_form.php");
            exit();
        } else {
            echo $result;
        }
    } else {
        echo "Failed to upload image.";
    }
}
?>
