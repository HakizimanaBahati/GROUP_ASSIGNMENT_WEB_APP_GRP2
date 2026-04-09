<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Students - Student Registration System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Student Registration System</h1>
        <p>View and manage all registered students</p>
    </div>

    <nav class="nav-tabs">
        <a href="index.php" class="nav-tab">Registration Form</a>
        <a href="students.php" class="nav-tab active">View Students</a>
    </nav>

    <div class="content">
        <h2>Registered Students</h2>

        <?php
        require_once 'db_config.php';

        $totalStudents = 0;
        $maleCount = 0;
        $femaleCount = 0;

        $result = $conn->query("SELECT COUNT(*) as total FROM students");
        if ($result) {
            $row = $result->fetch_assoc();
            $totalStudents = $row['total'];
        }

        $maleResult = $conn->query("SELECT COUNT(*) as count FROM students WHERE gender = 'Male'");
        if ($maleResult) {
            $maleRow = $maleResult->fetch_assoc();
            $maleCount = $maleRow['count'];
        }

        $femaleResult = $conn->query("SELECT COUNT(*) as count FROM students WHERE gender = 'Female'");
        if ($femaleResult) {
            $femaleRow = $femaleResult->fetch_assoc();
            $femaleCount = $femaleRow['count'];
        }
        ?>

        <div class="stats-grid">
            <div class="stat-card">
                <h4><?php echo $totalStudents; ?></h4>
                <p>Total Students</p>
            </div>
            <div class="stat-card">
                <h4><?php echo $maleCount; ?></h4>
                <p>Male Students</p>
            </div>
            <div class="stat-card">
                <h4><?php echo $femaleCount; ?></h4>
                <p>Female Students</p>
            </div>
        </div>

        <?php
        $sql = "SELECT * FROM students ORDER BY created_at DESC";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            echo '<div class="table-container">';
            echo '<table>';
            echo '<thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Gender</th>
                        <th>Course</th>
                        <th>City</th>
                        <th>Registered On</th>
                    </tr>
                  </thead>';
            echo '<tbody>';

            while ($row = $result->fetch_assoc()) {
                $genderBadge = $row['gender'] === 'Male' ? 'badge-male' : 'badge-female';
                $fullName = htmlspecialchars($row['first_name'] . ' ' . $row['last_name']);
                $registeredDate = date('d M Y', strtotime($row['created_at']));

                echo '<tr>';
                echo '<td>#' . $row['id'] . '</td>';
                echo '<td><strong>' . $fullName . '</strong></td>';
                echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                echo '<td>' . htmlspecialchars($row['mobile']) . '</td>';
                echo '<td><span class="badge ' . $genderBadge . '">' . $row['gender'] . '</span></td>';
                echo '<td>' . htmlspecialchars($row['course']) . '</td>';
                echo '<td>' . htmlspecialchars($row['city']) . '</td>';
                echo '<td>' . $registeredDate . '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        } else {
            echo '<div class="empty-state">';
            echo '<h3>No Students Registered Yet</h3>';
            echo '<p>Be the first to register! <a href="index.php">Click here to register</a></p>';
            echo '</div>';
        }

        $conn->close();
        ?>
    </div>
</div>

<div class="container">
    <div class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h4>Student Registration</h4>
                <p>A comprehensive system to manage student records efficiently and securely.</p>
            </div>
            <div class="footer-section">
                <h4>Quick Links</h4>
                <a href="index.php">Registration Form</a>
                <a href="students.php">View Students</a>
            </div>
            <div class="footer-section">
                <h4>Contact</h4>
                <p>Email: bahati7pro@gmail.com</p>
                <p>Phone: 0783401856</p>
            </div>
        </div>
    </div>
</div>

</body>
</html>
