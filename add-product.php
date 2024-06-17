<?php

include('config.php');

$db = new Database();
$conn = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_SESSION['user_id'];
    $product = htmlspecialchars($_POST['product']);
    $price = floatval($_POST['price']);
    $description = htmlspecialchars($_POST['description']);
    $location = htmlspecialchars($_POST['location']);

    $image = $_FILES['image']['name'];
    $target = "upload_storage/" . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        if ($db->insertProduct($userId, $image, $product, $price, $description, $location)) {
            header("Location: profile.php");
            exit();
        } else {
            echo "Failed to insert product.";
        }
    } else {
        echo "Failed to upload image.";
    }
}

$db->closeConnection();
?>