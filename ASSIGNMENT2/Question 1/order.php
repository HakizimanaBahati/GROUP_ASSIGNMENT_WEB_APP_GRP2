<?php
require_once 'config.php';

$successMessage = '';
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerName = $_POST['customerName'] ?? '';
    $phoneNumber = $_POST['phoneNumber'] ?? '';
    $foodItem = $_POST['foodItem'] ?? '';
    $quantity = $_POST['quantity'] ?? 1;
    $deliveryAddress = $_POST['deliveryAddress'] ?? '';
    $extraMessage = $_POST['extraMessage'] ?? '';

    if ($customerName && $phoneNumber && $foodItem && $deliveryAddress) {
        try {
            $stmt = $pdo->prepare("INSERT INTO orders (customer_name, phone_number, food_item, quantity, delivery_address, extra_message) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$customerName, $phoneNumber, $foodItem, $quantity, $deliveryAddress, $extraMessage]);
            $successMessage = "Thank you, " . htmlspecialchars($customerName) . "! Your order for " . htmlspecialchars($foodItem) . " (x$quantity) has been received. We will contact you shortly.";
        } catch(PDOException $e) {
            $errorMessage = "Failed to submit order. Please try again.";
        }
    } else {
        $errorMessage = "Please fill in all required fields.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Golden Palm Hotel | Order</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="site-wrapper">
        <div class="topbar">Golden Palm Hotel | Order Your Food Online</div>

        <div class="navbar">
            <a href="index.php">Home</a>
            <a href="about.php">About Us</a>
            <a href="menu.php">Menu</a>
            <a class="active" href="order.php">Order</a>
            <a href="gallery.php">Gallery</a>
            <a href="contact.php">Contact Us</a>
        </div>

        <div class="section">
            <div class="section-title">
                <h2>Online Order Form</h2>
                <p>Fill in the form below to order your meal. You can also come from the gallery page and the item will be selected automatically.</p>
            </div>

            <?php if ($successMessage): ?>
                <div style="background: #d4edda; color: #155724; padding: 20px; border-radius: 15px; margin-bottom: 30px; border-left: 5px solid #28a745; max-width: 800px; margin-left: auto; margin-right: auto;">
                    <strong>✓ Order Received!</strong><br>
                    <?php echo $successMessage; ?>
                </div>
            <?php endif; ?>

            <?php if ($errorMessage): ?>
                <div style="background: #f8d7da; color: #721c24; padding: 20px; border-radius: 15px; margin-bottom: 30px; border-left: 5px solid #dc3545; max-width: 800px; margin-left: auto; margin-right: auto;">
                    <strong>⚠ Error:</strong> <?php echo $errorMessage; ?>
                </div>
            <?php endif; ?>

            <div class="form-card">
                <form method="POST" action="">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="customerName">Full Name</label>
                            <input type="text" id="customerName" name="customerName" placeholder="Enter your full name" required value="<?php echo $_POST['customerName'] ?? ''; ?>">
                        </div>

                        <div class="form-group">
                            <label for="phoneNumber">Phone Number</label>
                            <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="+250 7XX XXX XXX" required value="<?php echo $_POST['phoneNumber'] ?? ''; ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="foodItem">Food or Drink Item</label>
                            <select id="foodItem" name="foodItem" required>
                                <option value="">Select an item</option>
                                <option value="Grilled Tilapia" <?php echo (($_POST['foodItem'] ?? '') === 'Grilled Tilapia') ? 'selected' : ''; ?>>Grilled Tilapia</option>
                                <option value="Fried Fish Platter" <?php echo (($_POST['foodItem'] ?? '') === 'Fried Fish Platter') ? 'selected' : ''; ?>>Fried Fish Platter</option>
                                <option value="Fresh Coffee" <?php echo (($_POST['foodItem'] ?? '') === 'Fresh Coffee') ? 'selected' : ''; ?>>Fresh Coffee</option>
                                <option value="Soft Drink" <?php echo (($_POST['foodItem'] ?? '') === 'Soft Drink') ? 'selected' : ''; ?>>Soft Drink</option>
                                <option value="Mango Juice" <?php echo (($_POST['foodItem'] ?? '') === 'Mango Juice') ? 'selected' : ''; ?>>Mango Juice</option>
                                <option value="Passion Juice" <?php echo (($_POST['foodItem'] ?? '') === 'Passion Juice') ? 'selected' : ''; ?>>Passion Juice</option>
                                <option value="Chicken Pilau" <?php echo (($_POST['foodItem'] ?? '') === 'Chicken Pilau') ? 'selected' : ''; ?>>Chicken Pilau</option>
                                <option value="Fruit Salad" <?php echo (($_POST['foodItem'] ?? '') === 'Fruit Salad') ? 'selected' : ''; ?>>Fruit Salad</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" id="quantity" name="quantity" min="1" value="<?php echo $_POST['quantity'] ?? '1'; ?>" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="deliveryAddress">Delivery Address</label>
                            <textarea id="deliveryAddress" name="deliveryAddress" placeholder="Enter your delivery address" required><?php echo $_POST['deliveryAddress'] ?? ''; ?></textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="extraMessage">Additional Notes</label>
                            <textarea id="extraMessage" name="extraMessage" placeholder="Any special instructions for your order?"><?php echo $_POST['extraMessage'] ?? ''; ?></textarea>
                        </div>
                    </div>

                    <button class="button submit-button" type="submit">Submit Order</button>
                </form>
            </div>
        </div>

        <div class="footer">
            <p>Fast confirmation, clean preparation, and friendly service every day.</p>
        </div>
    </div>

    <script>
        function setSelectedFoodFromLink() {
            var params = new URLSearchParams(window.location.search);
            var selectedItem = params.get("item");
            var foodField = document.getElementById("foodItem");

            if (selectedItem && foodField) {
                foodField.value = selectedItem;
            }
        }

        window.onload = setSelectedFoodFromLink;
    </script>
</body>
</html>
