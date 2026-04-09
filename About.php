<?php
$page_title = 'About Us';
include 'includes/header.php';
?>

<div class="page-hero">
  <div class="container page-hero-content">
    <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="index.php">Home</a></li><li class="breadcrumb-item active">About Us</li></ol></nav>
    <h1 class="mt-2">About <span class="text-emerald">Vindhyavasini</span></h1>
    <p class="text-muted-custom mt-2" style="max-width:540px;">Trusted healthcare partner serving the community with quality medicines and professional services.</p>
  </div>
</div>

<section>
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-6 reveal">
        <span class="hero-tagline"><i class="bi bi-building-check me-2"></i>Est. 2010</span>
        <h2 class="section-title mt-3">Who We Are</h2>
        <p style="color:var(--text-mute);margin-top:20px;line-height:1.9;">
          Vindhyavasini Medical Store is a trusted pharmacy located at Zamania Railway Station, Ghazipur, Uttar Pradesh. We are dedicated to providing a wide range of genuine medicines, healthcare products, and professional services to meet the diverse medical needs of our community.
        </p>
        <p style="color:var(--text-mute);margin-top:16px;line-height:1.9;">
          Our store is equipped with a comprehensive inventory and staffed by knowledgeable professionals who are committed to your health and well-being. We believe healthcare should be accessible, affordable, and compassionate.
        </p>
        <div class="d-flex gap-3 mt-4">
          <a href="contact.php" class="btn-emerald"><i class="bi bi-envelope"></i> Contact Us</a>
          <a href="products.php" class="btn-outline"><i class="bi bi-bag2"></i> Our Products</a>
        </div>
      </div>
      <div class="col-lg-6 reveal">
        <div class="row g-3">
          <?php
          $stats = [
            ['10,000+', 'Happy Customers',   'people',        'green'],
            ['500+',    'Products Available', 'bag-plus',      'gold'],
            ['14+',     'Years of Service',   'calendar-check','green'],
            ['24/7',    'Available Support',  'headset',       'gold'],
          ];
          foreach ($stats as $s): ?>
          <div class="col-6">
            <div class="glass-card p-4 text-center">
              <div class="service-icon mx-auto mb-2" style="background:rgba(<?= $s[3]==='gold'?'240,165,0':'0,184,148' ?>,0.12);color:var(--<?= $s[3]==='gold'?'gold':'emerald' ?>)">
                <i class="bi bi-<?= $s[2] ?>"></i>
              </div>
              <div style="font-family:'Playfair Display',serif;font-size:1.8rem;font-weight:700;color:var(--<?= $s[3]==='gold'?'gold':'emerald' ?>)"><?= $s[0] ?></div>
              <div style="color:var(--text-mute);font-size:.85rem;"><?= $s[1] ?></div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section style="background:var(--navy-mid);border-top:1px solid var(--border);border-bottom:1px solid var(--border);">
  <div class="container">
    <div class="text-center mb-5 reveal"><h2 class="section-title mx-auto" style="display:inline-block">What We Offer</h2></div>
    <div class="row g-4">
      <?php
      $offerings = [
        ['Skin Disease Treatments',  'bandaid',        'Solutions for fungal infections, eczema, and various dermatological conditions in tablet and topical forms.'],
        ['Vitamin Supplements',      'capsule',        'High-quality vitamin and mineral supplements for rapid enhancement of overall health and immunity.'],
        ['Diabetes Management',      'droplet-half',   'Comprehensive medicines and monitoring equipment to help manage blood sugar levels effectively.'],
        ['Blood Pressure Control',   'heart-pulse',    'Antihypertensive medications and monitoring devices for maintaining healthy blood pressure levels.'],
        ['Antibiotics',              'shield-plus',    'Broad-spectrum antibiotics in tablet and injectable forms, available with valid prescriptions.'],
        ['Nutritional Drinks',       'cup-straw',      'Health drinks and nutritional supplements for adults, children, and elderly for optimal nutrition.'],
      ];
      foreach ($offerings as $o): ?>
      <div class="col-lg-4 col-md-6 reveal">
        <div class="glass-card p-4 h-100">
          <div class="about-feature-icon"><i class="bi bi-<?= $o[1] ?>"></i></div>
          <h5 style="font-family:'Playfair Display',serif;color:var(--white);margin-bottom:8px;"><?= $o[0] ?></h5>
          <p style="color:var(--text-mute);font-size:.88rem;line-height:1.7;"><?= $o[2] ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-6 reveal">
        <h2 class="section-title">Our Mission &amp; Values</h2>
        <div class="mt-4">
          <?php
          $values = [
            ['Quality First',      'award',       'We stock only genuine, certified medicines from reputed manufacturers.'],
            ['Community Care',     'people',      'We are committed to making quality healthcare accessible to everyone.'],
            ['Expert Guidance',    'mortarboard', 'Our staff provide professional advice for all your health concerns.'],
            ['Always Available',   'clock',       'We are open 24/7 including holidays for medical emergencies.'],
          ];
          foreach ($values as $v): ?>
          <div class="d-flex gap-3 mb-4">
            <div class="service-icon flex-shrink-0" style="width:44px;height:44px;font-size:1.1rem;"><i class="bi bi-<?= $v[1] ?>"></i></div>
            <div><strong style="color:var(--white);display:block;margin-bottom:4px;"><?= $v[0] ?></strong><span style="color:var(--text-mute);font-size:.88rem;"><?= $v[2] ?></span></div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="col-lg-6 reveal">
        <div class="glass-card p-5 text-center" style="background:linear-gradient(135deg,rgba(0,184,148,0.08),rgba(17,34,64,0.5));">
          <i class="bi bi-heart-pulse-fill" style="font-size:4rem;color:var(--emerald);"></i>
          <h3 style="font-family:'Playfair Display',serif;margin-top:20px;">"Health is Wealth"</h3>
          <p style="color:var(--text-mute);margin-top:12px;font-style:italic;">We exist to ensure that quality healthcare is never out of reach for the people of Zamania and beyond.</p>
          <a href="contact.php" class="btn-emerald mt-4"><i class="bi bi-telephone"></i> Get in Touch</a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
