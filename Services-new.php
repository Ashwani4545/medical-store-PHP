<?php
// Services Page

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>VINDHYAVASINI MEDICAL STORE - Services</title>
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

        .container {
            max-width: 1200px;
            margin: 20px auto;
            margin-top: 20px;
            padding: 0 20px;
        }

        h1 {
            font-size: 50px;
            color: white;
            text-decoration: none;
            margin-left: 340px;
        }

        h2 {
            font-size: 36px;
            color: white;
            margin-bottom: 30px;
            margin-left: 20px;
        }

        .service-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 20px;
        }

        .service-card {
            width: 300px;
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            text-align: center;
            transition: transform 0.2s;
        }

        .service-card:hover {
            transform: scale(1.05);
        }

        .service-card h3 {
            color: #007bff;
        }

        .service-card p {
            color: #333;
        }

        a.service-link {
            text-decoration: none;
            color: inherit;
        }

        a.service-link:hover .service-card {
            border-color: #007bff;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            color: aliceblue;
            border: 1px solid #fff;
            padding: 4px 10px;
            font-size: 18px;
            font-weight: 600;
            border-radius: 3px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            background: transparent;
            position: relative;
            cursor: pointer;
        }

        .btn:hover {
            border: 1px solid#f6f6f6;
            background: #ffffff;
            transition: 0.5s;
            color: #444;
            font-weight: 600;
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

    <h1>VINDHYAVASINI MEDICAL STORE</h1>
    <section id="service">
        <h2><u>Our Services-</u></h2>
        <div class="container">
            <div class="service-container">

                <a href="BP-Monitoring.php" class="service-link">
                    <div class="service-card">
                        <h3>Blood Pressure Monitoring</h3>
                        <p>Free or low-cost blood pressure checks and monitoring services.</p>
                    </div>
                </a>

                <a href="ChronicDiseaseManagement.php" class="service-link">
                    <div class="service-card">
                        <h3>Chronic Disease Management</h3>
                        <p>Programs to help manage chronic conditions like diabetes, hypertension, and asthma.</p>
                    </div>
                </a>

                <a href="CustomerSupport.php" class="service-link">
                    <div class="service-card">
                        <h3>24/7 Customer Support</h3>
                        <p>Our customer support team is available 24/7 to assist you with any questions or concerns.</p>
                    </div>
                </a>

                <a href="EmergencyServices.php" class="service-link">
                    <div class="service-card">
                        <h3>Emergency Services</h3>
                        <p>The emergency service is available 24/7 to assist you.</p>
                    </div>
                </a>

                <a href="HomeDelivery.php" class="service-link">
                    <div class="service-card">
                        <h3>Home Delivery</h3>
                        <p>We offer convenient home delivery services for your medications and healthcare products.</p>
                    </div>
                </a>

                <a href="LabBooking.php" class="service-link">
                    <div class="service-card">
                        <h3>Lab Booking</h3>
                        <p>Our customer support team is available 24/7 to assist you with any questions or concerns.</p>
                    </div>
                </a>

                <a href="MedicineEqipmentRent.php" class="service-link">
                    <div class="service-card">
                        <h3>Medical Equipment Rental</h3>
                        <p>Rental services for medical equipment such as wheelchairs, crutches, and nebulizers.</p>
                    </div>
                </a>

                <a href="MedicalSynchronization.php" class="service-link">
                    <div class="service-card">
                        <h3>Medical Synchronization</h3>
                        <p>Coordinating all your prescription refills so they can be picked up at the same time each
                            month.</p>
                    </div>
                </a>

                <a href="NutritionalCounselling.php" class="service-link">
                    <div class="service-card">
                        <h3>Nutritional Counselling</h3>
                        <p>Sessions with a nutritionist to develop personalized diet plans and healthy eating
                            strategies.</p>
                    </div>
                </a>

                <a href="OnlineConsultation.php" class="service-link">
                    <div class="service-card">
                        <h3>Online Consultation</h3>
                        <p>The online consultation with the doctor is available to assist you with any questions or
                            concerns related to your cure.</p>
                    </div>
                </a>
                <a href="OnlinePrescription.php" class="service-link">
                    <div class="service-card">
                        <h3>Online Prescription Orders</h3>
                        <p>Order your prescriptions online and have them ready for pick-up at our store.</p>
                    </div>
                </a>

                <a href="Telemedicine.php" class="service-link">
                    <div class="service-card">
                        <h3>Telemedicine</h3>
                        <p>Virtual appointments with healthcare providers for medical advice, diagnoses, and treatment
                            plans.</p>
                    </div>
                </a>

                <a href="VaccineAdministration.php" class="service-link">
                    <div class="service-card">
                        <h3>Vaccine Administration</h3>
                        <p>On-site vaccination services for flu, COVID-19, and other immunizations.</p>
                    </div>
                </a>

                <a href="WellnessProgram.php" class="service-link">
                    <div class="service-card">
                        <h3>Wellness Programs</h3>
                        <p>Regular workshops on various health topics like nutrition, mental health, and chronic disease
                            management.</p>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <hr>
    <footer>
        <div class="footer-rights">
            Copyright &#169; vindhyavasinimedicalstore.com | All rights are reserved
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
</body>

</html>