<?php
// Home Page

?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Store</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
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
            justify-content: space-between;
            align-items: center;
            height: 75px;
            padding: 0 20px;
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
            position: relative;
            animation: slideIn 1s ease-in-out;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            display: flex;
            align-items: center;
            animation: slideIn 1s ease-in-out;
        }

        nav ul li a:hover {
            color: rgb(153, 153, 226);
            font-size: 1rem;
        }

        nav ul li a::after {
            content: ' ▼';
            margin-left: 5px;
        }

        .cart-icon {
            font-size: 1.5rem;
            color: white;
            margin-left: 15px;
        }

        .search-bar {
            display: flex;
            align-items: center;
            background-color: #007bff;
            padding: 5px;
            border-radius: 5px;
        }

        .search-bar select,
        .search-bar input[type="text"] {
            padding: 8px;
            border-radius: 5px;
            border: none;
            outline: none;
            margin: 0 5px;
        }

        .search-bar button {
            padding: 8px 15px;
            border: none;
            background-color: white;
            color: #007bff;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .search-bar button:hover {
            background-color: #0056b3;
            color: white;
        }

        main hr {
            border: 0;
            background: #9c97f1;
            height: 1.2px;
            margin: 40px 84px;
        }

        .left {
            font-size: 1.5rem;
        }

        .firstSection {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin: 120px 0;
        }

        .firstSection>div {
            width: 30%;
        }

        .leftSection {
            font-size: 1.75rem;
            margin: 30px 0;
        }

        .leftSection .btn {
            padding: 12px;
        }

        .rightSection img {
            width: 120%;
            animation: fadeIn 2s ease-in;
        }

        .white {
            color: whitesmoke;
        }

        .text-gray {
            color: gray;
            text-size-adjust: 30px;
        }

        #element {
            color: red;
        }

        h1 {
            font-size: 30px;
            color: white;
            text-decoration: none;
        }

        h2 {
            font-size: 70px;
            color: white;
            margin-left: 450px;
        }

        h3,
        h4,
        p {
            font-size: 20px;
            color: white;
            margin-bottom: 10px;
        }

        h5 {
            font-size: 90px;
            color: white;
            margin-bottom: 10px;
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideIn {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animated-title {
            animation: fadeInUp 2s ease-in-out;
        }

        .product-container {
            display: flex;
            overflow-x: auto;
            white-space: nowrap;
            padding: 10px;
        }

        .product {
            display: inline-block;
            border-radius: 5px;
            padding: 30px;
            margin: 5px;
            text-align: center;
            max-width: 200px;
            border-radius: 5px;
        }

        .product p {
            font-size: 16px;
            margin: 10px 0;
        }

        .product h3 {
            font-size: 18px;
            color: white;
            margin: 10px 0;
        }

        .product img {
            width: 200px;
            height: 200px;
            border-radius: 50px;
            transition: transform 0.3s ease-in-out;
        }

        .product img:hover {
            transform: scale(1.1);
        }

        #products {
            text-align: center;
            color: black;
        }

        #products h2 {
            font-size: 36px;
            text-decoration: none;
            text-align: left;
            padding: 20px;
            margin-bottom: 5px;
        }

        .view-all {
            display: inline-block;
            margin-top: 10px;
            margin-right: 20px;
            color: #007bff;
            text-decoration: none;
            font-size: 16px;

        }

        .view-all::after {
            content: ' →';
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }

        .boxed-section {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            max-width: 1400px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .service-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 20px;
        }

        .service-container img {
            width: 200px;
            height: 200px;
            border-radius: 50px;
            transition: transform 0.3s ease-in-out;
        }

        .service-container img:hover {
            transform: scale(1.1);
        }

        #testimonials {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px 20px;
            color: white;
            text-align: center;
        }

        .testimonial-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .testimonial {
            width: 30%;
            margin: 20px 0;
        }

        .testimonial p {
            font-size: 18px;
            font-style: italic;
        }

        .testimonial h5 {
            font-size: 16px;
            margin-top: 10px;
            color: #007bff;
        }

        #newsletter {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px 20px;
            color: white;
            text-align: center;
        }

        .newsletter-form {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .newsletter-form input[type="email"] {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px 0 0 5px;
            border: 1px solid #ccc;
            outline: none;
        }

        .newsletter-form button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 0 5px 5px 0;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        .newsletter-form button:hover {
            background-color: #0056b3;
        }

        .faq-section {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px 20px;
            color: white;
            text-align: center;
        }

        .faq-container {
            text-align: left;
            max-width: 800px;
            margin: 0 auto;
        }

        .faq-container h4 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .faq-container p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .faq-container button {
            display: block;
            width: 100%;
            padding: 10px;
            text-align: left;
            border: none;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            cursor: pointer;
            font-size: 18px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .faq-container button:focus {
            outline: none;
        }

        .faq-container button.active+.faq-answer {
            display: block;
        }

        .faq-answer {
            display: none;
            padding: 10px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 5px;
            margin-top: 10px;
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
            transition: all 0.3s ease;
        }

        .btn:hover {
            border: 1px solid #f6f6f6;
            background: #ffffff;
            color: #444;
            transform: scale(1.1);
        }

        .cta-btn {
            padding: 12px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
            display: inline-block;
        }

        .cta-btn:hover {
            background-color: #0056b3;
        }

        .section-heading {
            background: rgba(255, 255, 255, 0.2);
            padding: 10px;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
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

        .social-links {
            list-style: none;
            padding: 0;
        }

        .social-links li {
            display: inline;
            margin-right: 10px;
        }

        .social-links img {
            width: 32px;
            height: 32px;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="products.php">Store</a></li>
            </ul>
            <div class="search-bar">
                <select>
                    <option>All</option>
                    <option>Products</option>
                    <option>Categories</option>
                </select>
                <input type="text" placeholder="Search...">
                <button>Search</button>
            </div>
            <div class="cart-icon">
                <i class="fas fa-shopping-cart"></i>
            </div>
        </nav>
    </header>

    <main>
        <section class="firstSection" data-aos="fade-up" data-aos-duration="1000">
            <div class="leftSection">
                <span class="white">Welcome to-</span><br>
                <h5 class="animated-title"><span class="white"><b>VINDHYAVASINI MEDICAL STORE</b></span></h5>
                <span class="white">The trusted medical store in area.</span>
                <span id="element"></span>
                <br><br>
                <a href="products.php" class="btn cta-btn">Shop Now</a>
            </div>
            <div class="rightSection">
                <img src="pharmacy.webp" alt="Medical Store" class="animate__animated animate__fadeIn">
            </div>
        </section>


        <div class="container boxed-section" id="products">
            <div class="section-heading">
                <h4>Our Products</h4>
            </div>
            <div class="product-container">
                <div class="product">
                    <img src="https://th.bing.com/th/id/OIP.v5bTReqMBZvz6vNofGRsegHaHa?rs=1&pid=ImgDetMain"
                        alt="Medicine Image">
                    <h3>Ayurveda</h3>
                </div>
                <div class="product">
                    <img src="https://cdn-icons-png.flaticon.com/512/3731/3731013.png" alt="Medicine Image">
                    <h3>Baby Care Products</h3>
                </div>
                <div class="product">
                    <img src="https://png.pngtree.com/png-clipart/20220110/original/pngtree-illustration-of-white-blood-pressure-device-png-image_7058148.png"
                        alt="Medicine Image">
                    <h3>Blood Pressure Medications</h3>
                </div>
                <div class="product">
                    <img src="https://th.bing.com/th/id/OIP._AQ6ojXQsecnOiEwPGQDpgHaHg?rs=1&pid=ImgDetMain"
                        alt="Medicine Image">
                    <h3>Diabetes Medications</h3>
                </div>
                <div class="product">
                    <img src="https://cdn4.iconfinder.com/data/icons/supermarket-50/512/Supplement-Nutrition-Pills-Vitamins-512.png"
                        alt="Medicine Image">
                    <h3>Heath and Drink supplements</h3>
                </div>
            </div>
            <a href="products.php" class="view-all">View All Products</a>
        </div>

        <div class="container boxed-section" id="services">
            <div class="section-heading">
                <h4>Our Services</h4>
            </div>
            <div class="service-container">
                <div class="service">
                    <a href="OnlineConsultation.php" class="service">
                        <img src="https://medkare.co/wp-content/uploads/2021/05/Online-Counsultation-1024x1024.png"
                            alt="Medicine Image">
                        <h3>Online Consultation</h3>
                    </a>
                </div>
                <div class="service">
                    <a href="OnlinePrescription.php" class="service">
                        <img src="https://png.pngtree.com/png-clipart/20220131/original/pngtree-medical-prescription-and-medicine-vector-illustration-png-image_7258262.png"
                            alt="Medicine Image">
                        <h3>Online Prescription</h3>
                    </a>
                </div>
                <div class="service">
                    <img src="https://th.bing.com/th/id/OIP.qvrj2msEKb1HVK0xG5cs2AHaHD?rs=1&pid=ImgDetMain"
                        alt="Medicine Image">
                    <h3>BP Monitoring</h3>
                </div>
                <div class="service">
                    <img src="https://max-website20-images.s3.ap-south-1.amazonaws.com/Medicine_Delivery_1_2_9b414c1f7f.png"
                        alt="Medicine Image">
                    <h3>Home Delivery</h3>
                </div>
                <div class="service">
                    <img src="https://th.bing.com/th/id/OIP.z2p-ekNg_tZ18M2G6oHs1gAAAA?w=260&h=280&rs=1&pid=ImgDetMain"
                        alt="Medicine Image">
                    <h3>LAB Booking</h3>
                </div>
            </div>
            <a href="services.php" class="view-all">View All Services</a>
        </div>

        <section id="testimonials" data-aos="fade-up" data-aos-duration="1000">
            <div class="container">
                <div class="section-heading">
                    <h4>What Our Customers Say</h4>
                </div>
                <div class="testimonial-container">
                    <div class="testimonial">
                        <p>"The best medical store in the area! Excellent customer service and quick delivery."</p>
                        <h5>- John Doe</h5>
                    </div>
                    <div class="testimonial">
                        <p>"Great selection of products and very helpful staff. Highly recommend!"</p>
                        <h5>- Jane Smith</h5>
                    </div>
                    <div class="testimonial">
                        <p>"I always find what I need at Vindhyavasini Medical Store. Their online services are
                            top-notch."</p>
                        <h5>- Emily Johnson</h5>
                    </div>
                    <div class="testimonial">
                        <p>"Great service and fast delivery!"</p>
                        <h5>- Akhil Pandey</h5>
                    </div>
                    <div class="testimonial">
                        <p>"Wide range of products at great prices."</p>
                        <h5>- Sanskar Singh Rajput</h5>
                    </div>
                    <div class="testimonial">
                        <p>"I trust this store for all my medical needs."</p>
                        <h5>- Sameer Hussain</h5>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="faq-section" id="faq">
            <div class="container">
                <div class="section-heading">
                    <h4>Frequently Asked Questions</h4>
                </div>
                <div class="faq-container">
                    <button>What is your return policy?</button>
                    <div class="faq-answer">
                        <p>We offer a 30-day return policy on all products. Please contact our support team for more
                            details.</p>
                    </div>
                    <button>Do you offer international shipping?</button>
                    <div class="faq-answer">
                        <p>Yes, we offer international shipping. Shipping charges and delivery times may vary based on
                            location.</p>
                    </div>
                    <!-- Add more FAQs as needed -->
                </div>
            </div>
        </section>

        <section id="newsletter">
            <div class="container">
                <div class="section-heading">
                    <h4>Subscribe to Our Newsletter</h4>
                </div>
                <form class="newsletter-form">
                    <input type="email" placeholder="Enter your email address" required>
                    <button type="submit" class="btn">Subscribe</button>
                </form>
            </div>
        </section>
    </main>
    <hr>
    <footer>
        <div class="footer">
            <div>
                <h4>Contact Us</h4>
                <p>Email: vindhyavasinimedicalstore0009@gmail.com</p>
                <p>Phone: +91 95849 90009</p>
            </div>
            <div>
                <h4>Follow Us</h4>
                <ul class="social-links">
                    <li><a href="#"><img src="facebook-icon.png" alt="Facebook"></a></li>
                    <li><a href="#"><img src="twitter-icon.png" alt="Twitter"></a></li>
                    <li><a href="#"><img src="instagram-icon.png" alt="Instagram"></a></li>
                </ul>
            </div>
        </div>
        <div class="footer-rights">
            Copyright &#169; vindhyavasinimedicalstore.com | All rights are reserved
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <script>
        AOS.init();

        // FAQ accordion functionality
        document.querySelectorAll('.faq-container button').forEach(button => {
            button.addEventListener('click', () => {
                button.classList.toggle('active');
                const answer = button.nextElementSibling;
                if (button.classList.contains('active')) {
                    answer.style.display = 'block';
                } else {
                    answer.style.display = 'none';
                }
            });
        });
    </script>

    <script src="script.js"></script>
</body>

</html>