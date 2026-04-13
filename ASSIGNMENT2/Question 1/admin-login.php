<?php
session_start();

if (isset($_SESSION['admin_id'])) {
    header('Location: admin.php');
    exit;
}

require_once 'config.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = ? LIMIT 1");
    $stmt->execute([$username]);
    $admin = $stmt->fetch();
    
    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_username'] = $admin['username'];
        header('Location: admin.php');
        exit;
    } else {
        $error = 'Invalid username or password';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | BIT Hotel</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f7f1e8 0%, #e8ddd0 100%);
            padding: 20px;
        }

        .login-card {
            background: white;
            padding: 50px 40px;
            border-radius: 20px;
            box-shadow: 0 15px 45px rgba(92, 46, 31, 0.15);
            width: 100%;
            max-width: 420px;
            text-align: center;
        }

        .login-card h1 {
            color: #5c2e1f;
            margin-bottom: 10px;
            font-size: 28px;
        }

        .login-card .subtitle {
            color: #888;
            margin-bottom: 35px;
            font-size: 14px;
        }

        .login-card .form-group {
            width: 100%;
            float: none;
            text-align: left;
            margin-bottom: 20px;
        }

        .login-card .form-group input {
            width: 100%;
            padding: 16px;
            border: 2px solid #e6c8ae;
            border-radius: 12px;
            font-size: 15px;
            transition: 0.3s;
        }

        .login-card .form-group input:focus {
            outline: none;
            border-color: #d88a39;
            box-shadow: 0 0 0 4px rgba(216, 138, 57, 0.15);
        }

        .login-card .submit-button {
            width: 100%;
            padding: 16px;
            font-size: 16px;
            margin-top: 10px;
        }

        .error-message {
            background: #fee;
            color: #c33;
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
            border-left: 4px solid #c33;
        }

        .back-link {
            display: inline-block;
            margin-top: 25px;
            color: #8b4513;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
        }

        .back-link:hover {
            color: #d88a39;
        }

        .lock-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #d88a39 0%, #b76521 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 30px;
            color: white;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="lock-icon">🔐</div>
            <h1>Admin Login</h1>
            <p class="subtitle">BIT Hotel Management System</p>

            <?php if ($error): ?>
                <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter username" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter password" required>
                </div>

                <button type="submit" class="button submit-button">Sign In</button>
            </form>

            <a href="index.php" class="back-link">← Back to Website</a>
        </div>
    </div>
</body>
</html>
