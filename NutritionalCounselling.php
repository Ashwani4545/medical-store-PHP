<?php
// NutritionalCounselling.php
$page_title = 'Nutritional Counselling';
$success = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    if ($name) $success = "Thank you, $name! Your nutritional counselling session has been booked. Our dietitian will contact you shortly.";
}
include 'includes/header.php';
?>
<div class="page-hero">
  <div class="container page-hero-content">
    <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="index.php">Home</a></li><li class="breadcrumb-item active">Nutritional Counselling</li></ol></nav>
    <h1 class="mt-2"><i class="bi bi-egg-fried text-emerald me-3"></i>Nutritional <span class="text-emerald">Counselling</span></h1>
    <p class="text-muted-custom mt-2">Expert dietary guidance tailored to your health goals and medical conditions.</p>
  </div>
</div>
<section>
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-6 reveal">
        <div class="form-section">
          <h3 style="font-family:'Playfair Display',serif;color:var(--white);margin-bottom:6px;">Book a Session</h3>
          <?php if ($success): ?><div class="alert-success-custom mb-4"><i class="bi bi-check-circle me-2"></i><?= $success ?></div><?php endif; ?>
          <form method="POST" action="">
            <div class="row g-3">
              <div class="col-12"><label class="form-label">Full Name *</label><input type="text" name="name" class="form-control" placeholder="Your name" required></div>
              <div class="col-md-6"><label class="form-label">Email *</label><input type="email" name="email" class="form-control" placeholder="your@email.com" required></div>
              <div class="col-md-6"><label class="form-label">Phone *</label><input type="tel" name="phone" class="form-control" placeholder="+91 XXXXX XXXXX" required></div>
              <div class="col-12"><label class="form-label">Health Goal</label>
                <select name="goal" class="form-select">
                  <option>Weight Loss</option><option>Muscle Gain</option><option>Diabetes Management</option>
                  <option>Heart Health</option><option>General Wellness</option>
                </select>
              </div>
              <div class="col-12"><label class="form-label">Additional Message</label><textarea name="message" class="form-control" rows="3" placeholder="Any specific concerns…"></textarea></div>
              <div class="col-12"><button type="submit" class="btn-emerald w-100 justify-content-center" style="padding:13px;"><i class="bi bi-calendar-check"></i> Book Now</button></div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-lg-6 reveal">
        <h3 style="font-family:'Playfair Display',serif;color:var(--white);margin-bottom:20px;">What We Offer</h3>
        <?php $services=[['Personalized Diet Plans','journal-text','Custom meal plans based on your health goals, allergies, and preferences.'],['Chronic Disease Nutrition','clipboard2-pulse','Specialized diets for diabetes, hypertension, PCOS, thyroid, and more.'],['Weight Management','bar-chart-line','Science-backed strategies for sustainable weight loss or gain.'],['Sports Nutrition','trophy','Fuel your performance with optimized pre/post workout nutrition.']]; foreach ($services as $s): ?>
        <div class="glass-card p-3 mb-3 d-flex gap-3 align-items-start">
          <div class="service-icon flex-shrink-0" style="width:44px;height:44px;font-size:1rem;"><i class="bi bi-<?= $s[1] ?>"></i></div>
          <div><strong style="color:var(--white);display:block;"><?= $s[0] ?></strong><span style="color:var(--text-mute);font-size:.85rem;"><?= $s[2] ?></span></div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
<?php include 'includes/footer.php'; ?>
