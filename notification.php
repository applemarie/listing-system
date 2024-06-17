<?php
include('config.php'); // Ensure this file contains your database connection setup
include('add_purchase.php');


if (!isset($_SESSION['user_id'])) {
    header("Location: login_form.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch cart items for the logged-in user
$cart_items_query = "SELECT image, product, price, description, location FROM cart WHERE user_id = ?";
$stmt = $conn->prepare($cart_items_query);
if ($stmt === false) {
    die('Prepare failed: ' . htmlspecialchars($conn->error));
}

$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$cart_items = [];
$item_count = $result->num_rows;

while ($row = $result->fetch_assoc()) {
    $cart_items[] = $row;
}

$stmt->close();
?>