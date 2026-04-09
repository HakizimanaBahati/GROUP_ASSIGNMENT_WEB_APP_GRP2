<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Result</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Student Registration System</h1>
        <p>Registration status</p>
    </div>

    <nav class="nav-tabs">
        <a href="index.php" class="nav-tab">Registration Form</a>
        <a href="students.php" class="nav-tab">View Students</a>
    </nav>

    <div class="content">
        <?php
        require_once 'db_config.php';

        $first = $conn->real_escape_string($_POST['first_name']);
        $last = $conn->real_escape_string($_POST['last_name']);
        $dob = $conn->real_escape_string($_POST['dob']);
        $email = $conn->real_escape_string($_POST['email']);
        $mobile = $conn->real_escape_string($_POST['mobile']);
        $gender = $conn->real_escape_string($_POST['gender']);
        $address = $conn->real_escape_string($_POST['address']);
        $city = $conn->real_escape_string($_POST['city']);
        $pin = $conn->real_escape_string($_POST['pin_code']);
        $state = $conn->real_escape_string($_POST['state']);
        $country = $conn->real_escape_string($_POST['country']);
        $course = $conn->real_escape_string($_POST['course']);

        $hobbies = "";
        if (!empty($_POST['hobbies'])) {
            $hobbies = $conn->real_escape_string(implode(",", $_POST['hobbies']));
        }

        $sql = "INSERT INTO students 
                (first_name, last_name, dob, email, mobile, gender, address, city, pin_code, state, country, hobbies, course)
                VALUES 
                ('$first','$last','$dob','$email','$mobile','$gender','$address','$city','$pin','$state','$country','$hobbies','$course')";

        if ($conn->query($sql) === TRUE) {
            echo '<div class="success-message">';
            echo '<h3>Registration Successful!</h3>';
            echo '<p>Thank you for registering, <strong>' . htmlspecialchars($first) . ' ' . htmlspecialchars($last) . '</strong></p>';
            echo '<p>Your registration for <strong>' . htmlspecialchars($course) . '</strong> has been confirmed.</p>';
            echo '<button class="btn" onclick="window.location.href=\'students.php\'">View All Students</button>';
            echo '</div>';
        } else {
            echo '<div class="error-message">';
            echo '<h3>Registration Failed</h3>';
            echo '<p>Error: ' . $conn->error . '</p>';
            echo '<button class="btn" onclick="window.history.back()">Go Back</button>';
            echo '</div>';
        }

        $conn->close();
        ?>

        <div style="text-align: center; margin-top: 20px;">
            <a href="index.php" class="btn btn-secondary">Register Another Student</a>
        </div>
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
                <p>Email: info@studentreg.edu</p>
                <p>Phone: +91 98765 43210</p>
            </div>
        </div>
    </div>
</div>

</body>
</html>
