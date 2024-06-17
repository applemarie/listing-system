<?php
include('config.php'); // Ensure this file contains your database connection setup
include('add_purchase.php');
include('header.php');


if (!isset($_SESSION['user_id'])) {
    header("Location: login_form.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Handle product deletion if requested
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_product'])) {
    $delete_product_id = intval($_GET['delete_product']);

    // Delete product from the cart
    $delete_query = "DELETE FROM cart WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($delete_query);
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("ii", $delete_product_id, $user_id);
    if ($stmt->execute()) {
        $delete_message = 'Product deleted successfully.';
    } else {
        $delete_message = 'Failed to delete product.';
    }

    $stmt->close();
}

// Fetch cart items for the logged-in user
$cart_items_query = "SELECT id, image, product, price, description, location FROM cart WHERE user_id = ?";
$stmt = $conn->prepare($cart_items_query);
if ($stmt === false) {
    die('Prepare failed: ' . htmlspecialchars($conn->error));
}

$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$cart_items = [];

while ($row = $result->fetch_assoc()) {
    $cart_items[] = $row;
}

$stmt->close();
?>
    <?php if (isset($delete_message)): ?>
        <div class="delete-message"><?php echo htmlspecialchars($delete_message); ?></div>
    <?php endif; ?>

    <table>
        <tr>
            <th>Image</th>
            <th>Product</th>
            <th>Price</th>
            <th>Description</th>
            <th>Location</th>
            <th>Action</th>
        </tr>

        <?php if (!empty($cart_items)): ?>
            <?php foreach ($cart_items as $item): ?>
                <tr>
                    <td><img src="<?php echo htmlspecialchars($item['image']); ?>" width="100px" alt="<?php echo htmlspecialchars($item['product']); ?>"></td>
                    <td><?php echo htmlspecialchars($item['product']); ?></td>
                    <td><?php echo htmlspecialchars($item['price']); ?></td>
                    <td><?php echo htmlspecialchars($item['description']); ?></td>
                    <td><?php echo htmlspecialchars($item['location']); ?></td>
                    <td><a href="cart.php?delete_product=<?php echo $item['id']; ?>" class="delete-link" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="no-items">No items in the cart.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>
