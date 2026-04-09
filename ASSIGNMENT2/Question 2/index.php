<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>News Layout</title>

<style>
body {
    font-family: Arial;
    background: #eee;
    margin: 0;
}

/* MAIN CONTAINER */
.container {
    width: 90%;
    margin: auto;
    background: white;
}

/* HEADER */
.header {
    padding: 10px;
}

.header-top {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 20px;
}

.header-top img {
    width: 80px;
    height: 80px;
    object-fit: cover;
}

.header h1 {
    margin: 0;
    text-align: center;
}

.header p {
    font-size: 14px;
    text-align: center;
}

.red-text {
    color: red;
}

.green-text {
    color: green;
}

/* NAVBAR */
.navbar {
    background: #b22222;
    overflow: hidden;
}

.navbar a {
    float: left;
    color: white;
    padding: 12px 20px;
    text-decoration: none;
}

.navbar a:hover {
    background: #8b0000;
}

/* CONTENT */
.content {
    display: flex;
    justify-content: space-around;
    padding: 20px;
}

/* CARD */
.card {
    width: 30%;
    background: #f9f9f9;
    border: 1px solid #ccc;
}

/* IMAGE */
.card img {
    width: 100%;
    height: 200px;
}

/* TITLE */
.card-title {
    background: #2f4f4f;
    color: orange;
    padding: 8px;
    font-weight: bold;
}

/* TEXT */
.card-text {
    padding: 10px;
    font-size: 14px;
}
</style>

</head>
<body>

<div class="container">

    <!-- HEADER -->
    <div class="header">
        <div class="header-top">
            <img src="image/img4.png" alt="Left header image">
            <h1>INTEKO NYARWANDA Y'URURIMI N'UMUCO</h1>
            <img src="image/img5.jpg" alt="Right header image">
        </div>
        <p>
            <b class="red-text">Ntibavuga:</b> Yigeze kurwara umutwe yenda kurira. |
            <b class="green-text">Bavuga:</b> Yigeze kurwara umutwe yenda kurira
        </p>
    </div>

    <!-- NAVBAR -->
    <div class="navbar">
        <a href="#">Home</a>
        <a href="#">Entertainment</a>
        <a href="#">Politique</a>
        <a href="#">Sports</a>
        <a href="#">Business</a>
        <a href="#">About Us</a>
        <a href="#">Contact Us</a>
    </div>

    <!-- CONTENT -->
    <div class="content">

        <!-- CARD 1 -->
        <div class="card">
            <img src="image/img1.jpg" alt="News image 1">
            <div class="card-title">Player of the Week on 23</div>
            <div class="card-text">
                Note that it's important to have both opening and closing curly braces 
                around each element's style. You also need to make sure your element's 
                style is between the opening and closing style tags.
            </div>
        </div>

        <!-- CARD 2 -->
        <div class="card">
            <img src="image/img2.jpg" alt="News image 2">
            <div class="card-title">Player of the Week on 23</div>
            <div class="card-text">
                Note that it's important to have both opening and closing curly braces 
                around each element's style. You also need to make sure your element's 
                style is between the opening and closing style tags.
            </div>
        </div>

        <!-- CARD 3 -->
        <div class="card">
            <img src="image/img3.jpg" alt="News image 3">
            <div class="card-title">Player of the Week on 23</div>
            <div class="card-text">
                Note that it's important to have both opening and closing curly braces 
                around each element's style. You also need to make sure your element's 
                style is between the opening and closing style tags.
            </div>
        </div>

    </div>

</div>

</body>
</html>
