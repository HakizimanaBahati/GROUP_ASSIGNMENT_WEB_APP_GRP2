<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Student Registration System</h1>
        <p>Register new students and manage their information</p>
    </div>

    <nav class="nav-tabs">
        <a href="index.php" class="nav-tab active">Registration Form</a>
        <a href="students.php" class="nav-tab">View Students</a>
    </nav>

    <div class="content">
        <h2>Student Registration Form</h2>

        <form name="form" method="POST" action="insert.php" onsubmit="return validateForm()">
            <div class="form-grid">
                <div class="form-group">
                    <label for="first_name">First Name *</label>
                    <input type="text" id="first_name" name="first_name" placeholder="Enter first name" required>
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" placeholder="Enter last name">
                </div>

                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" id="dob" name="dob">
                </div>

                <div class="form-group">
                    <label for="email">Email ID *</label>
                    <input type="email" id="email" name="email" placeholder="Enter email address" required>
                </div>

                <div class="form-group">
                    <label for="mobile">Mobile Number</label>
                    <input type="tel" id="mobile" name="mobile" placeholder="Enter mobile number">
                </div>

                <div class="form-group">
                    <label>Gender *</label>
                    <div class="radio-group">
                        <label><input type="radio" name="gender" value="Male" required> Male</label>
                        <label><input type="radio" name="gender" value="Female"> Female</label>
                    </div>
                </div>

                <div class="form-group full-width">
                    <label for="address">Address</label>
                    <textarea id="address" name="address" placeholder="Enter your address"></textarea>
                </div>

                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" id="city" name="city" placeholder="Enter city">
                </div>

                <div class="form-group">
                    <label for="pin_code">Pin Code</label>
                    <input type="text" id="pin_code" name="pin_code" placeholder="Enter pin code">
                </div>

                <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" id="state" name="state" placeholder="Enter state">
                </div>

                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" id="country" name="country" value="India" readonly>
                </div>

                <div class="form-group full-width">
                    <label>Hobbies</label>
                    <div class="checkbox-group">
                        <label><input type="checkbox" name="hobbies[]" value="Reading"> Reading</label>
                        <label><input type="checkbox" name="hobbies[]" value="Drawing"> Drawing</label>
                        <label><input type="checkbox" name="hobbies[]" value="Singing"> Singing</label>
                        <label><input type="checkbox" name="hobbies[]" value="Dancing"> Dancing</label>
                        <label><input type="checkbox" name="hobbies[]" value="Cricket"> Cricket</label>
                        <label><input type="checkbox" name="hobbies[]" value="Sketching"> Sketching</label>
                    </div>
                </div>

                <div class="form-group full-width">
                    <label>Course Applied *</label>
                    <div class="radio-group">
                        <label><input type="radio" name="course" value="BCA" required> BCA</label>
                        <label><input type="radio" name="course" value="BCom"> B.Com</label>
                        <label><input type="radio" name="course" value="BSc"> B.Sc</label>
                        <label><input type="radio" name="course" value="BA"> B.A</label>
                        <label><input type="radio" name="course" value="BBA"> BBA</label>
                        <label><input type="radio" name="course" value="MBA"> MBA</label>
                    </div>
                </div>
            </div>

            <div class="btn-container">
                <button type="submit" class="btn btn-primary">Register</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form>
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

<script>
    function validateForm() {
        const firstName = document.forms["form"]["first_name"].value;
        const email = document.forms["form"]["email"].value;
        const gender = document.querySelector('input[name="gender"]:checked');
        const course = document.querySelector('input[name="course"]:checked');

        if (firstName === "") {
            alert("First Name is required!");
            return false;
        }

        if (email === "") {
            alert("Email is required!");
            return false;
        }

        if (!gender) {
            alert("Please select a gender!");
            return false;
        }

        if (!course) {
            alert("Please select a course!");
            return false;
        }

        return true;
    }
</script>

</body>
</html>
