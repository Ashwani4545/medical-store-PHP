<?php
$page_title = 'Home';
include 'includes/header.php';
?>

<!-- Hero Section -->
<section class="hero-section">
  <div class="hero-bg-glow"></div>
  <div class="hero-bg-glow2"></div>
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6 fade-up">
        <span class="hero-tagline"><i class="bi bi-shield-heart me-2"></i>Trusted Healthcare Partner</span>
        <h1 class="hero-title mt-2">
          Your Health,<br><span class="highlight">Our Priority</span>
        </h1>
        <p class="hero-subtitle">
          Vindhyavasini Medical Store — providing quality medicines, supplements, and comprehensive healthcare services to the community of Zamania.
        </p>
        <div class="d-flex gap-3 flex-wrap">
          <a href="products.php" class="btn-emerald"><i class="bi bi-bag2"></i>Shop Now</a>
          <a href="OnlineConsultation.php" class="btn-outline"><i class="bi bi-camera-video"></i>Book Consultation</a>
        </div>
        <div class="hero-stats">
          <div><div class="hero-stat-num">10K+</div><div class="hero-stat-label">Happy Customers</div></div>
          <div><div class="hero-stat-num">500+</div><div class="hero-stat-label">Products</div></div>
          <div><div class="hero-stat-num">24/7</div><div class="hero-stat-label">Support</div></div>
        </div>
      </div>
      <div class="col-lg-6 text-center fade-up delay-2">
        <div class="hero-img-wrap">
          <img src="https://img.freepik.com/free-vector/pharmacy-concept-illustration_114360-3560.jpg" alt="Medical Store" onerror="this.src='https://via.placeholder.com/520x460/112240/00b894?text=Vindhyavasini'">
          <div class="hero-badge badge-1">
            <div class="badge-icon green"><i class="bi bi-award"></i></div>
            <div><div class="badge-num">ISO</div><div class="badge-text">Certified Store</div></div>
          </div>
          <div class="hero-badge badge-2">
            <div class="badge-icon gold"><i class="bi bi-truck"></i></div>
            <div><div class="badge-num">Free</div><div class="badge-text">Home Delivery</div></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Services Strip -->
<div class="services-strip">
  <div class="container">
    <div class="row g-0 text-center text-lg-start">
      <div class="col-lg-3 col-6"><div class="strip-item justify-content-center justify-content-lg-start"><i class="bi bi-truck"></i><div><strong>Free Delivery</strong><span>Orders above ₹500</span></div></div></div>
      <div class="col-lg-3 col-6"><div class="strip-item justify-content-center justify-content-lg-start"><i class="bi bi-shield-check"></i><div><strong>100% Genuine</strong><span>Certified medicines</span></div></div></div>
      <div class="col-lg-3 col-6"><div class="strip-item justify-content-center justify-content-lg-start"><i class="bi bi-headset"></i><div><strong>24/7 Support</strong><span>Always available</span></div></div></div>
      <div class="col-lg-3 col-6"><div class="strip-item justify-content-center justify-content-lg-start"><i class="bi bi-arrow-counterclockwise"></i><div><strong>Easy Returns</strong><span>30-day policy</span></div></div></div>
    </div>
  </div>
</div>

<!-- Products Section -->
<section>
  <div class="container">
    <div class="d-flex justify-content-between align-items-end mb-5 reveal">
      <div><h2 class="section-title">Shop by Category</h2><p class="section-subtitle">Quality products for every health need</p></div>
      <a href="products.php" class="btn-outline d-none d-md-inline-flex">View All <i class="bi bi-arrow-right"></i></a>
    </div>
    <div class="row g-4">
      <?php
      $categories = [
        ['Health Supplements', 'HealthandDrinkSupplements.php', 'https://cdn4.iconfinder.com/data/icons/supermarket-50/512/Supplement-Nutrition-Pills-Vitamins-512.png', 'From ₹199', 'pills'],
        ['Baby Care',          'products.php?cat=baby',        'https://cdn-icons-png.flaticon.com/512/3731/3731013.png', 'From ₹149', 'emoji-laughing'],
        ['Blood Pressure Meds','products.php?cat=bp',          'https://png.pngtree.com/png-clipart/20220110/original/pngtree-illustration-of-white-blood-pressure-device-png-image_7058148.png', 'From ₹89', 'heart-pulse'],
        ['Diabetes Medicines', 'products.php?cat=diabetes',    'https://th.bing.com/th/id/OIP._AQ6ojXQsecnOiEwPGQDpgHaHg?rs=1&pid=ImgDetMain', 'From ₹120', 'capsule'],
        ['Ayurveda',           'products.php?cat=ayurveda',    'https://th.bing.com/th/id/OIP.v5bTReqMBZvz6vNofGRsegHaHa?rs=1&pid=ImgDetMain', 'From ₹99', 'flower1'],
        ['Personal Care',      'products.php?cat=personal',    'https://cdn-icons-png.flaticon.com/512/2921/2921226.png', 'From ₹79', 'person-check'],
      ];
      foreach ($categories as $cat): ?>
      <div class="col-lg-2 col-md-4 col-6 reveal">
        <a href="<?= $cat[1] ?>" class="text-decoration-none">
          <div class="product-card text-center p-3 h-100">
            <div class="product-card-img" style="height:130px;border-radius:10px;margin-bottom:12px;">
              <img src="<?= $cat[2] ?>" alt="<?= $cat[0] ?>" onerror="this.src='https://via.placeholder.com/200/112240/00b894?text=<?= urlencode($cat[0]) ?>'">
            </div>
            <div class="product-card-name" style="font-size:.9rem;"><?= $cat[0] ?></div>
            <div class="text-emerald" style="font-size:.8rem;font-weight:600;"><?= $cat[3] ?></div>
          </div>
        </a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Services Section -->
<section style="background:var(--navy-mid);border-top:1px solid var(--border);border-bottom:1px solid var(--border);">
  <div class="container">
    <div class="text-center mb-5 reveal">
      <h2 class="section-title mx-auto" style="display:inline-block">Our Services</h2>
      <p class="section-subtitle">Comprehensive healthcare at your fingertips</p>
    </div>
    <div class="row g-4">
      <?php
      $services = [
        ['Online Consultation',    'OnlineConsultation.php',    'camera-video',       'Book video consultations with expert doctors from home.'],
        ['Online Prescription',    'OnlinePrescription.php',    'file-medical',       'Upload prescriptions and order medicines online easily.'],
        ['BP Monitoring',          'BPMonitoring.php',          'heart-pulse',        'Track and record your blood pressure readings digitally.'],
        ['Lab Booking',            'LabBooking.php',            'flask',              'Book diagnostic lab tests with home sample collection.'],
        ['Home Delivery',          'HomeDelivery.php',          'truck',              'Fast and reliable delivery of medicines to your doorstep.'],
        ['Nutritional Counselling','NutritionalCounselling.php','egg-fried',          'Expert dietary guidance for a healthier lifestyle.'],
        ['Vaccine Administration', 'VaccineAdministration.php', 'shield-plus',        'Get vaccinated on schedule for you and your family.'],
        ['Equipment Rental',       'MedicineEquipmentRent.php', 'tools',              'Rent medical equipment like wheelchairs, beds, and more.'],
        ['Chronic Disease Mgmt',   'ChronicDiseaseManagement.php','clipboard2-pulse', 'Ongoing support for diabetes, hypertension, and more.'],
        ['Emergency Services',     'EmergencyServices.php',     'exclamation-octagon','Rapid emergency response and ambulance coordination.'],
        ['24/7 Customer Support',  'CustomerSupport.php',       'headset',            'Round-the-clock assistance for all your queries.'],
        ['Medical Sync',           'MedicalSynchronization.php','arrow-repeat',       'Synchronize your health data and wellness programs.'],
      ];
      foreach ($services as $svc): ?>
      <div class="col-lg-3 col-md-4 col-sm-6 reveal">
        <div class="service-card">
          <div class="service-icon"><i class="bi bi-<?= $svc[2] ?>"></i></div>
          <div class="service-title"><?= $svc[0] ?></div>
          <p class="service-desc"><?= $svc[3] ?></p>
          <a href="<?= $svc[1] ?>" class="service-link">Learn more <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Testimonials -->
<section>
  <div class="container">
    <div class="text-center mb-5 reveal">
      <h2 class="section-title mx-auto" style="display:inline-block">What Customers Say</h2>
      <p class="section-subtitle">Real experiences from our valued patients</p>
    </div>
    <div class="row g-4">
      <?php
      $testimonials = [
        ['John Doe',         'Ghazipur', 'Best medical store in the area! Excellent customer service and lightning-fast delivery. Highly recommended!', 5],
        ['Jane Smith',       'Zamania',  'Great selection of products and very helpful staff. I always find what I need here.', 5],
        ['Emily Johnson',    'Varanasi', 'Their online consultation service is outstanding. Got expert advice without leaving home.', 5],
        ['Akhil Pandey',     'Zamania',  'Great service and fast delivery! The BP monitoring feature is really useful.', 4],
        ['Sanskar Singh',    'Ghazipur', 'Wide range of products at great prices. Quality is always top-notch.', 5],
        ['Sameer Hussain',   'Zamania',  'I trust this store for all my medical needs. They have never let me down.', 5],
      ];
      foreach ($testimonials as $t): ?>
      <div class="col-lg-4 col-md-6 reveal">
        <div class="testimonial-card">
          <div class="testimonial-stars"><?= str_repeat('★', $t[3]) . str_repeat('☆', 5 - $t[3]) ?></div>
          <p class="testimonial-text">"<?= $t[2] ?>"</p>
          <div class="testimonial-author">
            <div class="author-avatar"><?= $t[0][0] ?></div>
            <div><div class="author-name"><?= $t[0] ?></div><div class="author-loc"><i class="bi bi-geo-alt me-1"></i><?= $t[1] ?></div></div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- FAQ -->
<section style="background:var(--navy-mid);border-top:1px solid var(--border);border-bottom:1px solid var(--border);">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-4 reveal">
        <h2 class="section-title">Frequently Asked Questions</h2>
        <p class="section-subtitle mt-3">Can't find your answer? <a href="contact.php" class="text-emerald">Contact us</a></p>
      </div>
      <div class="col-lg-8 reveal">
        <?php
        $faqs = [
          ['What is your return policy?', 'We offer a 30-day return policy on all products. Items must be unused and in original packaging. Contact our support team to initiate a return.'],
          ['Do you offer international shipping?', 'Currently we serve within India. We offer fast shipping across Uttar Pradesh and neighbouring states with express delivery options available.'],
          ['Can I order medicines without a prescription?', 'OTC medicines can be ordered without a prescription. For prescription medicines, please upload your valid prescription during checkout.'],
          ['How does online consultation work?', 'Book an appointment, pay the consultation fee, and connect with our doctor via video call at your scheduled time. Get e-prescriptions instantly.'],
          ['Are your medicines genuine and certified?', 'Yes, all our medicines are sourced directly from licensed distributors and manufacturers. We are ISO certified and follow all regulatory guidelines.'],
        ];
        foreach ($faqs as $faq): ?>
        <div class="faq-item">
          <button class="faq-question"><?= $faq[0] ?> <span class="faq-icon">+</span></button>
          <div class="faq-answer"><?= $faq[1] ?></div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- Newsletter -->
<section>
  <div class="container">
    <div class="newsletter-section reveal">
      <h2 style="font-family:'Playfair Display',serif;font-size:2rem;font-weight:700;">Stay Informed, Stay Healthy</h2>
      <p style="color:rgba(255,255,255,.8);margin-top:8px;">Subscribe for health tips, offers, and new service announcements.</p>
      <form class="newsletter-form" id="newsletterForm">
        <input type="email" class="form-control" placeholder="Enter your email address" required>
        <button type="submit" class="btn-gold" style="white-space:nowrap;"><i class="bi bi-send"></i> Subscribe</button>
      </form>
    </div>
  </div>
</section>

<!-- Chat Widget -->
<div class="chat-widget">
  <div class="chat-box" id="chatBox">
    <div class="chat-head">
      <span><i class="bi bi-headset me-2"></i>Live Support</span>
      <button class="chat-close" id="chatClose">&times;</button>
    </div>
    <div class="chat-messages" id="chatMessages">
      <div class="chat-msg bot">Hi! 👋 How can I help you today?</div>
    </div>
    <div class="chat-input-row">
      <input type="text" id="chatInput" placeholder="Type a message…">
      <button id="chatSendBtn"><i class="bi bi-send-fill"></i></button>
    </div>
  </div>
  <button class="chat-btn" id="chatToggleBtn"><i class="bi bi-chat-dots-fill"></i></button>
</div>

<?php include 'includes/footer.php'; ?>
