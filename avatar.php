<?php

include('config.php');
include('auth.php');

$role = 'user';
$profile_pic = 'default_profile.png'; 

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT username, image, role FROM users WHERE id = ?");
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("i", $user_id);
    if (!$stmt->execute()) {
        die('Execute failed: ' . htmlspecialchars($stmt->error));
    }

    $stmt->bind_result($username, $profile_pic, $role);
    if ($stmt->fetch()) {

        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;
        $_SESSION['profile_pic'] = $profile_pic;
    }
    $stmt->close();


    if (empty($profile_pic)) {
        $profile_pic = 'default_profile.png';
    }
}
?>