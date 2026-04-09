<?php
// Wellness Program Page

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wellness Program</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            background-image: linear-gradient(rgba(7, 7, 8, 0.7), rgba(0, 0, 0, 0.7)), url('R.jpeg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
        }

        nav {
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 75px;
            animation: slideIn 1s ease-in-out;
        }

        nav ul {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        nav ul li {
            list-style: none;
            margin: 0 15px;
            animation: slideIn 1s ease-in-out;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            animation: slideIn 1s ease-in-out;
        }

        nav ul li a:hover {
            color: rgb(153, 153, 226);
            font-size: 1rem;
        }

        .cart-icon {
            font-size: 1.5rem;
            color: white;
            margin-left: 15px;
        }

        .search-bar {
            display: flex;
            align-items: left;
        }

        .search-bar select,
        .search-bar input[type="text"] {
            padding: 5px;
            margin-left: 10px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }

        .search-bar button {
            padding: 5px 10px;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 3px;
            cursor: pointer;
        }

        h1 {
            font-size: 50px;
            color: white;
            text-decoration: none;
            margin-left: 340px;
        }

        h2 {
            font-size: 20px;
            color: white;
            margin-bottom: 30px;
        }

        .container {
            max-width: 800px;
            color: white;
            margin: 0 auto;
            padding: 20px;
        }

        form label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        textarea {
            width: 50%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"],
        .btn {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover,
        .btn:hover {
            background-color: #45a049;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }

        .testimonial {
            background-color: #f9f9f9;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .testimonial p {
            font-style: italic;
            color: black;
        }

        .testimonial cite {
            display: block;
            color: black;
            text-align: right;
            margin-top: 10px;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer-logo h3 {
            margin: 0;
            font-size: 24px;
        }

        .footer-links ul,
        .footer-social ul {
            list-style: none;
            padding: 0;
        }

        .footer-links ul li,
        .footer-social ul li {
            display: inline-block;
            margin-right: 10px;
        }

        .footer-links a,
        .footer-social a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
        }

        .footer-bottom {
            margin-top: 20px;
        }

        footer {
            background-color: #0e0e1a;
        }

        .footer {
            display: flex;
            margin: 23px 122px;
            justify-content: space-evenly;
        }

        .footer ul {
            list-style: none;
        }

        .footer>div {
            width: 223px;
        }

        footer .footer-rights {
            text-align: center;
            color: gray;
            padding: 12px 0;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <div class="left"><b>MEDICAL STORE</b></div>
            <div class="search-bar">
                <select name="category" id="category">
                    <option value="category">All cateogries</option>
                    <option value="medicine">Medicine</option>
                    <option value="supplements">Health and Drinks Supplements</option>
                    <option value="personal-care">Personal Care</option>
                    <option value="baby-care">Baby Care</option>
                </select>
                <input type="text" placeholder="Search...">
                <button type="submit">Search</button>
            </div>

            <div class="right">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="cart.html" class="cart-icon">🛒</a></li>
                    <li><a href="Register_In.php" class="sign-in-icon">🔑</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <h1>Welcome to Our Wellness Program</h1>
    <section id="home">
        <div class="container">
            <h2>Improve Your Health and Well-being</h2>
            <p>Join our wellness program to achieve a healthier lifestyle.</p>
            <button class="btn" id="learnMoreButton">Learn More</button>
        </div>
    </section>

    <section id="services">
        <div class="container">
            <h2>Our Services</h2>
            <ul>
                <li>Personalized Nutrition Plans</li>
                <li>Fitness Coaching</li>
                <li>Mental Health Support</li>
                <li>Health Workshops</li>
            </ul>
        </div>
    </section>

    <section id="join">
        <div class="container">
            <h2>Join Our Program</h2>
            <form id="joinForm">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>

                <label for="phone">Phone</label>
                <input type="tel" id="phone" name="phone" required>

                <label for="goals">Your Goals</label>
                <textarea id="goals" name="goals" rows="4" required></textarea>

                <button type="submit" class="btn">Join Now</button>
            </form>
        </div>
    </section>

    <section id="testimonials">
        <div class="container">
            <h2>What Our Members Say</h2>
            <div class="testimonial">
                <p><b>"This program changed my life! I'm healthier and happier."</p></b>
                <cite><b>- Alex</cite></b>
            </div>
            <div class="testimonial">
                <p><b>"The personalized plans and support are amazing. Highly recommend!"</p></b>
                <cite><b>- Taylor</cite></b>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <h2>Contact Us</h2>
            <form id="contactForm">
                <label for="name">Name</label>
                <input type="text" id="contactName" name="name" required>

                <label for="email">Email</label>
                <input type="email" id="contactEmail" name="email" required>

                <label for="message">Message</label>
                <textarea id="contactMessage" name="message" rows="4" required></textarea>

                <button type="submit" class="btn">Send</button>
            </form>
        </div>
    </section>

    <hr>
    <footer>
        <div class="footer-rights">
            Copyright &#169; vindhyavasinimedicalstore.com | All rights are reserved
        </div>
    </footer>

    <script src="script.js"></script>
</body>

</html>