<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Golden Palm Hotel | Gallery</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="site-wrapper">
        <div class="topbar">Golden Palm Hotel | Gallery of Foods and Drinks</div>

        <div class="navbar">
            <a href="index.php">Home</a>
            <a href="about.php">About Us</a>
            <a href="menu.php">Menu</a>
            <a href="order.php">Order</a>
            <a class="active" href="gallery.php">Gallery</a>
            <a href="contact.php">Contact Us</a>
        </div>

        <div class="section">
            <div class="section-title">
                <h2>Food and Drink Gallery</h2>
                <p>Click any picture below to go directly to the order page and request that item.</p>
            </div>

            <div class="gallery-grid">
                <div class="gallery-card">
                    <a href="order.php?item=Grilled%20Tilapia">
                        <img src="image/img1.jpg" alt="Grilled tilapia dish">
                        <p>Grilled Tilapia</p>
                    </a>
                </div>

                <div class="gallery-card">
                    <a href="order.php?item=Fresh%20Coffee">
                        <img src="image/img2.jpg" alt="Fresh coffee">
                        <p>Fresh Coffee</p>
                    </a>
                </div>

                <div class="gallery-card third-card">
                    <a href="order.php?item=Mango%20Juice">
                        <img src="image/img3.jpg" alt="Mango juice">
                        <p>Mango Juice</p>
                    </a>
                </div>

                <div class="gallery-card">
                    <a href="order.php?item=Chicken%20Pilau">
                        <img src="image/img4.jpg" alt="Chicken pilau">
                        <p>Chicken Pilau</p>
                    </a>
                </div>

                <div class="gallery-card">
                    <a href="order.php?item=Fruit%20Salad">
                        <img src="image/img5.jpg" alt="Fruit salad">
                        <p>Fruit Salad</p>
                    </a>
                </div>
            </div>

            <div class="clear"></div>
        </div>

        <div class="footer">
            <p>Every gallery image links to the order page as requested.</p>
        </div>
    </div>
</body>
</html>
