<?php



include('config.php'); // Ensure this file contains your database connection setup



if (!isset($_SESSION['user_id'])) {
    header("Location: login_form.php");
    exit();
}

if (isset($_POST['add_to_cart'])) {

    // Sanitize inputs
    $image       = mysqli_real_escape_string($conn, $_POST['image']);
    $product     = mysqli_real_escape_string($conn, $_POST['product']);
    $price       = mysqli_real_escape_string($conn, $_POST['price']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $location    = mysqli_real_escape_string($conn, $_POST['location']);
    $user_id     = $_SESSION['user_id'];

    // Check if the product is already in the cart using a prepared statement
    $select_cart_query = "SELECT * FROM cart WHERE product = ? AND user_id = ?";
    $stmt = $conn->prepare($select_cart_query);
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("si", $product, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $message[] = 'Product already added to cart';
    } else {
        // Insert the product into the cart using a prepared statement
        $insert_product_query = "INSERT INTO cart (user_id, image, product, price, description, location) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_product_query);
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }

        $stmt->bind_param("issdss", $user_id, $image, $product, $price, $description, $location);
        if ($stmt->execute()) {
            $message[] = 'Product added to cart successfully';
            header("Location: cart.php");
            exit();
        } else {
            $message[] = 'Failed to add product to cart';
        }
    }

    $stmt->close();
}

// Display messages if any
if (!empty($message)) {
    foreach ($message as $msg) {
        echo "<script>alert('$msg');</script>";
    }
}
?>