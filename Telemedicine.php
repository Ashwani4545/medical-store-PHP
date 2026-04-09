<?php
// Telemedicine Page

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telemedicine</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-image: linear-gradient(rgba(7, 7, 8, 0.7), rgba(0, 0, 0, 0.7)), url('R.jpeg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
            font-family: Arial, sans-serif;
        }

        nav {
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 75px;
        }

        nav ul {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        nav ul li {
            list-style: none;
            margin: 0 15px;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            font-size: 0.9rem;
            transition: color 0.3s ease, transform 0.2s ease;
        }

        nav ul li a:hover {
            color: rgb(153, 153, 226);
            transform: translateY(-3px);
        }

        .cart-icon {
            font-size: 1.5rem;
            color: white;
            margin-left: 15px;
        }

        .search-bar {
            display: flex;
            align-items: center;
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

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
            text-align: center;
        }

        h1 {
            font-size: 50px;
            color: white;
            margin-left: 530px;
        }

        h2 {
            font-size: 36px;
            color: white;
            margin-bottom: 30px;
            margin-left: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        input[type="tel"],
        input[type="email"],
        textarea {
            width: 20%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="tel"]:focus,
        input[type="email"]:focus,
        textarea:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        input:invalid {
            border-color: #dc3545;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #555;
        }

        .message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }

        footer {
            background-color: #0e0e1a;
            margin-top: 20px;
        }

        .footer {
            display: flex;
            justify-content: space-evenly;
            color: white;
            padding: 23px 122px;
        }

        .footer ul {
            list-style: none;
        }

        .footer>div {
            width: 223px;
        }

        .footer-rights {
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
                    <option value="category">All categories</option>
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

    <h1>TELEMEDICINE</h1>
    <div class="container">
        <h2>Book a Telemedicine Appointment</h2>
        <form id="appointmentForm">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required>

            <label for="age">Age</label>
            <input type="number" id="age" name="age" required>

            <label for="gender">Gender</label>
            <select id="gender" name="gender" required>
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>

            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="problem">Describe Your Problem</label>
            <textarea id="problem" name="problem" rows="4" required></textarea>

            <button type="submit" class="btn">Book Appointment</button>
        </form>

        <div id="confirmationMessage" class="message"></div>
    </div>

    <footer>
        <div class="footer-rights">
            Copyright &#169; vindhyavasinimedicalstore.com | All rights are reserved
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="script.js"></script>
</body>

</html>