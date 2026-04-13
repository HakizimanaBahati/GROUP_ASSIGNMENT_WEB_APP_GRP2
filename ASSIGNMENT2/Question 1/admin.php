<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header('Location: admin-login.php');
    exit;
}

require_once 'config.php';

$message = '';
$messageType = '';

// Handle status update
if (isset($_POST['update_status'])) {
    $orderId = $_POST['order_id'];
    $newStatus = $_POST['new_status'];
    $stmt = $pdo->prepare("UPDATE orders SET status = ? WHERE id = ?");
    if ($stmt->execute([$newStatus, $orderId])) {
        $message = 'Order status updated successfully!';
        $messageType = 'success';
    } else {
        $message = 'Failed to update order status.';
        $messageType = 'error';
    }
}

// Handle delete order
if (isset($_POST['delete_order'])) {
    $orderId = $_POST['order_id'];
    $stmt = $pdo->prepare("DELETE FROM orders WHERE id = ?");
    if ($stmt->execute([$orderId])) {
        $message = 'Order deleted successfully!';
        $messageType = 'success';
    } else {
        $message = 'Failed to delete order.';
        $messageType = 'error';
    }
}

// Fetch all orders
$stmt = $pdo->query("SELECT * FROM orders ORDER BY created_at DESC");
$orders = $stmt->fetchAll();

// Stats
$totalOrders = count($orders);
$pendingOrders = count(array_filter($orders, fn($o) => $o['status'] === 'pending'));
$completedOrders = count(array_filter($orders, fn($o) => $o['status'] === 'delivered'));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | BIT Hotel</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }

        .admin-sidebar {
            width: 260px;
            background: linear-gradient(180deg, #3d1e13 0%, #2a150d 100%);
            color: white;
            padding: 30px 20px;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }

        .admin-sidebar h2 {
            font-size: 22px;
            margin-bottom: 10px;
            color: #d88a39;
        }

        .admin-sidebar .hotel-name {
            font-size: 14px;
            opacity: 0.7;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .admin-nav {
            list-style: none;
        }

        .admin-nav li {
            margin-bottom: 8px;
        }

        .admin-nav a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 18px;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            border-radius: 10px;
            transition: 0.3s;
            font-size: 15px;
        }

        .admin-nav a:hover,
        .admin-nav a.active {
            background: rgba(216, 138, 57, 0.2);
            color: white;
        }

        .admin-nav a.active {
            background: #d88a39;
        }

        .admin-nav .icon {
            font-size: 18px;
            width: 24px;
            text-align: center;
        }

        .admin-main {
            flex: 1;
            margin-left: 260px;
            padding: 30px;
            background: #f7f1e8;
        }

        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .admin-header h1 {
            color: #5c2e1f;
            font-size: 28px;
        }

        .admin-user {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .admin-user span {
            color: #666;
        }

        .logout-btn {
            background: #c33;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #a11;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(92, 46, 31, 0.08);
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
        }

        .stat-card.total::before { background: #3498db; }
        .stat-card.pending::before { background: #f39c12; }
        .stat-card.completed::before { background: #27ae60; }

        .stat-card .stat-icon {
            font-size: 35px;
            margin-bottom: 15px;
        }

        .stat-card .stat-value {
            font-size: 32px;
            font-weight: 700;
            color: #5c2e1f;
        }

        .stat-card .stat-label {
            color: #888;
            font-size: 14px;
        }

        .alert {
            padding: 16px 20px;
            border-radius: 10px;
            margin-bottom: 25px;
            font-weight: 500;
        }

        .alert.success {
            background: #d4edda;
            color: #155724;
            border-left: 4px solid #28a745;
        }

        .alert.error {
            background: #f8d7da;
            color: #721c24;
            border-left: 4px solid #dc3545;
        }

        .orders-section {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(92, 46, 31, 0.08);
        }

        .orders-section h2 {
            color: #5c2e1f;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #e6c8ae;
        }

        .orders-table {
            width: 100%;
            border-collapse: collapse;
        }

        .orders-table th {
            background: linear-gradient(135deg, #5c2e1f 0%, #3d1e13 100%);
            color: white;
            padding: 15px 12px;
            text-align: left;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .orders-table td {
            padding: 15px 12px;
            border-bottom: 1px solid #eee;
            font-size: 14px;
        }

        .orders-table tr:hover {
            background: #faf6f2;
        }

        .orders-table tr:last-child td {
            border-bottom: none;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-badge.pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-badge.confirmed {
            background: #cce5ff;
            color: #004085;
        }

        .status-badge.preparing {
            background: #ffe5d0;
            color: #c75000;
        }

        .status-badge.delivered {
            background: #d4edda;
            color: #155724;
        }

        .status-badge.cancelled {
            background: #f8d7da;
            color: #721c24;
        }

        .action-form {
            display: inline-flex;
            gap: 8px;
            align-items: center;
        }

        .action-form select {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 13px;
            background: white;
        }

        .action-form button {
            padding: 8px 14px;
            background: #d88a39;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 13px;
            cursor: pointer;
            transition: 0.3s;
        }

        .action-form button:hover {
            background: #b76521;
        }

        .delete-btn {
            background: #dc3545 !important;
        }

        .delete-btn:hover {
            background: #c82333 !important;
        }

        .no-orders {
            text-align: center;
            padding: 50px;
            color: #888;
        }

        .no-orders .icon {
            font-size: 50px;
            margin-bottom: 15px;
        }

        @media (max-width: 992px) {
            .admin-sidebar {
                width: 80px;
                padding: 20px 10px;
            }

            .admin-sidebar h2,
            .admin-sidebar .hotel-name,
            .admin-nav span {
                display: none;
            }

            .admin-nav a {
                justify-content: center;
                padding: 14px;
            }

            .admin-main {
                margin-left: 80px;
            }
        }

        @media (max-width: 768px) {
            .admin-sidebar {
                display: none;
            }

            .admin-main {
                margin-left: 0;
            }

            .orders-table {
                font-size: 12px;
            }

            .orders-table th,
            .orders-table td {
                padding: 10px 8px;
            }
        }
    </style>
</head>
<body>
    <div class="admin-wrapper">
        <aside class="admin-sidebar">
            <h2>Dashboard</h2>
            <p class="hotel-name">BIT Hotel</p>

            <ul class="admin-nav">
                <li>
                    <a href="admin.php" class="active">
                        <span class="icon">📋</span>
                        <span>Orders</span>
                    </a>
                </li>
                <li>
                    <a href="admin-login.php">
                        <span class="icon">🔐</span>
                        <span>Login</span>
                    </a>
                </li>
                <li>
                    <a href="index.php">
                        <span class="icon">🌐</span>
                        <span>Website</span>
                    </a>
                </li>
            </ul>
        </aside>

        <main class="admin-main">
            <div class="admin-header">
                <h1>📋 Orders Management</h1>
                <div class="admin-user">
                    <span>Welcome, <?php echo htmlspecialchars($_SESSION['admin_username']); ?></span>
                    <a href="logout.php" class="logout-btn">Logout</a>
                </div>
            </div>

            <?php if ($message): ?>
                <div class="alert <?php echo $messageType; ?>"><?php echo htmlspecialchars($message); ?></div>
            <?php endif; ?>

            <div class="stats-grid">
                <div class="stat-card total">
                    <div class="stat-icon">📦</div>
                    <div class="stat-value"><?php echo $totalOrders; ?></div>
                    <div class="stat-label">Total Orders</div>
                </div>
                <div class="stat-card pending">
                    <div class="stat-icon">⏳</div>
                    <div class="stat-value"><?php echo $pendingOrders; ?></div>
                    <div class="stat-label">Pending Orders</div>
                </div>
                <div class="stat-card completed">
                    <div class="stat-icon">✅</div>
                    <div class="stat-value"><?php echo $completedOrders; ?></div>
                    <div class="stat-label">Completed</div>
                </div>
            </div>

            <div class="orders-section">
                <h2>All Orders</h2>

                <?php if (empty($orders)): ?>
                    <div class="no-orders">
                        <div class="icon">📭</div>
                        <p>No orders yet. Orders will appear here when customers place them.</p>
                    </div>
                <?php else: ?>
                    <div style="overflow-x: auto;">
                        <table class="orders-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Phone</th>
                                    <th>Item</th>
                                    <th>Qty</th>
                                    <th>Address</th>
                                    <th>Notes</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orders as $order): ?>
                                    <tr>
                                        <td><strong>#<?php echo $order['id']; ?></strong></td>
                                        <td><?php echo htmlspecialchars($order['customer_name']); ?></td>
                                        <td><?php echo htmlspecialchars($order['phone_number']); ?></td>
                                        <td><?php echo htmlspecialchars($order['food_item']); ?></td>
                                        <td><?php echo $order['quantity']; ?></td>
                                        <td><?php echo htmlspecialchars(substr($order['delivery_address'], 0, 30)); ?><?php echo strlen($order['delivery_address']) > 30 ? '...' : ''; ?></td>
                                        <td><?php echo $order['extra_message'] ? htmlspecialchars(substr($order['extra_message'], 0, 25)).'...' : '-'; ?></td>
                                        <td><?php echo date('M d, H:i', strtotime($order['created_at'])); ?></td>
                                        <td>
                                            <span class="status-badge <?php echo $order['status']; ?>">
                                                <?php echo ucfirst($order['status']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <form class="action-form" method="POST">
                                                <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                                                <select name="new_status">
                                                    <option value="pending" <?php echo $order['status'] === 'pending' ? 'selected' : ''; ?>>Pending</option>
                                                    <option value="confirmed" <?php echo $order['status'] === 'confirmed' ? 'selected' : ''; ?>>Confirmed</option>
                                                    <option value="preparing" <?php echo $order['status'] === 'preparing' ? 'selected' : ''; ?>>Preparing</option>
                                                    <option value="delivered" <?php echo $order['status'] === 'delivered' ? 'selected' : ''; ?>>Delivered</option>
                                                    <option value="cancelled" <?php echo $order['status'] === 'cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                                                </select>
                                                <button type="submit" name="update_status">Update</button>
                                            </form>
                                            <form class="action-form" method="POST" onsubmit="return confirm('Delete this order?');">
                                                <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                                                <button type="submit" name="delete_order" class="delete-btn">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </main>
    </div>
</body>
</html>
