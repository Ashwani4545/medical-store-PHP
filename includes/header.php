<?php
$current_page = basename($_SERVER['PHP_SELF'], '.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . ' — Vindhyavasini Medical' : 'Vindhyavasini Medical Store'; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<!-- Top Banner -->
<div class="top-banner">
    <span><i class="bi bi-telephone-fill me-1"></i> +91 9584990009</span>
    <span class="mx-3">|</span>
    <span><i class="bi bi-clock-fill me-1"></i> Open 24/7</span>
    <span class="mx-3">|</span>
    <span><i class="bi bi-geo-alt-fill me-1"></i> Zamania, Ghazipur, UP</span>
    <div class="ms-auto">
        <a href="Register_In.php" class="top-banner-link"><i class="bi bi-person me-1"></i>Sign In</a>
        <a href="Register_page.php" class="top-banner-link ms-3"><i class="bi bi-person-plus me-1"></i>Register</a>
    </div>
</div>

<!-- Main Navbar -->
<nav class="navbar navbar-expand-lg main-nav sticky-top">
    <div class="container-fluid px-4">
        <a class="navbar-brand" href="index.php">
            <div class="brand-logo">
                <i class="bi bi-heart-pulse-fill"></i>
                <div>
                    <span class="brand-name">Vindhyavasini</span>
                    <span class="brand-sub">Medical Store</span>
                </div>
            </div>
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="mainNav">
            <!-- Search Bar -->
            <form class="nav-search mx-auto" action="products.php" method="GET">
                <div class="search-wrap">
                    <select name="category" class="search-cat">
                        <option value="">All</option>
                        <option value="medicine">Medicine</option>
                        <option value="supplements">Supplements</option>
                        <option value="personal-care">Personal Care</option>
                        <option value="baby-care">Baby Care</option>
                    </select>
                    <input type="text" name="q" placeholder="Search medicines, products..." class="search-input">
                    <button type="submit" class="search-btn"><i class="bi bi-search"></i></button>
                </div>
            </form>
            
            <ul class="navbar-nav ms-auto align-items-center gap-1">
                <li class="nav-item"><a class="nav-link <?php echo $current_page=='index'?'active':''; ?>" href="index.php">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?php echo in_array($current_page, ['products','HealthandDrinkSupplements'])?'active':''; ?>" href="#" data-bs-toggle="dropdown">Products</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="products.php">All Products</a></li>
                        <li><a class="dropdown-item" href="HealthandDrinkSupplements.php">Health Supplements</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?php echo in_array($current_page, ['OnlineConsultation','OnlinePrescription','BPMonitoring','LabBooking','HomeDelivery','NutritionalCounselling','VaccineAdministration','MedicineEquipmentRent','ChronicDiseaseManagement','EmergencyServices','CustomerSupport','MedicalSynchronization'])?'active':''; ?>" href="#" data-bs-toggle="dropdown">Services</a>
                    <ul class="dropdown-menu mega-menu">
                        <li><a class="dropdown-item" href="OnlineConsultation.php"><i class="bi bi-camera-video me-2"></i>Online Consultation</a></li>
                        <li><a class="dropdown-item" href="OnlinePrescription.php"><i class="bi bi-file-medical me-2"></i>Online Prescription</a></li>
                        <li><a class="dropdown-item" href="BPMonitoring.php"><i class="bi bi-heart-pulse me-2"></i>BP Monitoring</a></li>
                        <li><a class="dropdown-item" href="LabBooking.php"><i class="bi bi-flask me-2"></i>Lab Booking</a></li>
                        <li><a class="dropdown-item" href="HomeDelivery.php"><i class="bi bi-truck me-2"></i>Home Delivery</a></li>
                        <li><a class="dropdown-item" href="NutritionalCounselling.php"><i class="bi bi-egg-fried me-2"></i>Nutritional Counselling</a></li>
                        <li><a class="dropdown-item" href="VaccineAdministration.php"><i class="bi bi-shield-plus me-2"></i>Vaccine Administration</a></li>
                        <li><a class="dropdown-item" href="MedicineEquipmentRent.php"><i class="bi bi-tools me-2"></i>Equipment Rental</a></li>
                        <li><a class="dropdown-item" href="ChronicDiseaseManagement.php"><i class="bi bi-clipboard2-pulse me-2"></i>Chronic Disease Mgmt</a></li>
                        <li><a class="dropdown-item" href="EmergencyServices.php"><i class="bi bi-exclamation-octagon me-2"></i>Emergency Services</a></li>
                        <li><a class="dropdown-item" href="CustomerSupport.php"><i class="bi bi-headset me-2"></i>Customer Support</a></li>
                        <li><a class="dropdown-item" href="MedicalSynchronization.php"><i class="bi bi-arrow-repeat me-2"></i>Medical Sync</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link <?php echo $current_page=='about'?'active':''; ?>" href="about.php">About</a></li>
                <li class="nav-item"><a class="nav-link <?php echo $current_page=='contact'?'active':''; ?>" href="contact.php">Contact</a></li>
                <li class="nav-item">
                    <a class="nav-icon-btn" href="cart.php"><i class="bi bi-cart3"></i><span class="cart-badge" id="cartCount">0</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
