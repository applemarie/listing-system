<?php
include('config.php');


class UserLogin {
    private $conn;

    public function __construct($db_connection) {
        $this->conn = $db_connection;
    }

    public function loginUser($username, $password) {
        $stmt = $this->conn->prepare("SELECT id, username, password, role, image FROM users WHERE username = ?");
        if ($stmt === false) {
            return "Error preparing statement: " . $this->conn->error;
        }

        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($id, $fetched_username, $hashed_password, $role, $image);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id']  = $id;
            $_SESSION['username'] = $fetched_username;
            $_SESSION['role']     = $role;
            $_SESSION['image']    = $image;
            return true;
        } else {
            return false;
        }
    }
}

if (isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $userLogin = new UserLogin($conn);
    $loginResult = $userLogin->loginUser($username, $password);

    if ($loginResult === true) {
        if ($_SESSION['role'] == 'admin') {
            header("Location: admin_page.php");
        } else {
            header("Location: home.php");
        }
        exit();
    } else {
        echo "Invalid username or password.";
    }


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Assuming you have logic here to validate the user's credentials
        // and retrieve the user ID from the database.

        $userId = $retrievedUserIdFromDatabase; // Replace this with the actual user ID retrieval logic

        // Set the user ID in the session
        $_SESSION['user_id'] = $userId;

        // Redirect to the profile page or wherever appropriate
        header("Location: profile.php");
        exit();
    }
}
?>
