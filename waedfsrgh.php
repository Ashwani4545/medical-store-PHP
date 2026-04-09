<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telemedicine</title>
    <link rel="stylesheet" href="styles.css">
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

        header {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 10px 0;
            position: fixed;
            width: 100%;
            z-index: 1000;
            animation: fadeInDown 1s ease-out;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .search-bar {
            display: flex;
            align-items: center;
        }

        .search-bar select,
        .search-bar input[type="text"] {
            padding: 8px;
            margin-left: 10px;
            border-radius: 3px;
            border: 1px solid #ccc;
            font-size: 0.9rem;
        }

        .search-bar button {
            padding: 8px 12px;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 3px;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .search-bar button:hover {
            background-color: #0056b3;
        }

        .right ul {
            display: flex;
            list-style-type: none;
        }

        .right ul li {
            margin-left: 15px;
        }

        .right ul li a {
            text-decoration: none;
            color: white;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .right ul li a:hover {
            color: rgb(153, 153, 226);
        }

        .container {
            max-width: 1200px;
            margin: 100px auto 0;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            animation: slideInUp 1s ease-out;
        }

        h1 {
            font-size: 3rem;
            text-align: center;
            margin-bottom: 30px;
            animation: slideInLeft 1s ease-out;
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            text-align: center;
            animation: slideInRight 1s ease-out;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            animation: slideInUp 1s ease-out;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: white;
            font-size: 0.9rem;
            animation: slideInUp 1s ease-out;
        }

        input[type="text"],
        input[type="number"],
        input[type="tel"],
        input[type="email"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 0.9rem;
            background-color: #f8f9fa;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #555;
        }

        .message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            font-size: 0.9rem;
            animation: slideInUp 1s ease-out;
        }

        footer {
            background-color: #0e0e1a;
            color: gray;
            text-align: center;
            padding: 15px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .footer {
            display: flex;
            justify-content: center;
        }

        .footer p {
            margin: 0;
            font-size: 0.8rem;
        }

        @keyframes fadeInDown {
            0% {
                transform: translateY(-50px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes slideInUp {
            0% {
                transform: translateY(50px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes slideInLeft {
            0% {
                transform: translateX(-50px);
                opacity: 0;
            }
            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideInRight {
            0% {
                transform: translateX(50px);
                opacity: 0;
            }
            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="left logo">MEDICAL STORE</div>
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
                    <li><a href="home.html">Home</a></li>
                    <li><a href="products.html">Products</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="cart.html" class="cart-icon">🛒</a></li>
                    <li><a href="Register_In.html" class="sign-in-icon">🔑</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container">
        <h1>TELEMEDICINE</h1>
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
        <div class="footer">
            <p>&copy; vindhyavasinimedicalstore.com | All rights reserved</p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>
