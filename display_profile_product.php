

<?php
include('config.php');


if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT image, product, price, description, location FROM product_sell WHERE user_id = ?");
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }
    $stmt->bind_param("i", $user_id);
    if (!$stmt->execute()) {
        die('Execute failed: ' . htmlspecialchars($stmt->error));
    }
    $stmt->bind_result($image, $product, $price, $description, $location);

    // Fetch all results into an array
    $products = [];
    while ($stmt->fetch()) {
        $products[] = [
            'image' => $image,
            'product' => $product,
            'price' => $price,
            'description' => $description,
            'location' => $location
        ];
    }
    $stmt->close();
}
?>