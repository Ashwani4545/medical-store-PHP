<?php
// LabBooking.php
$page_title = 'Lab Booking';
$success = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    if ($name && $email) {
        $success = "Appointment booked for $name! We'll confirm via email/SMS within 2 hours.";
    }
}
include 'includes/header.php';
?>
<div class="page-hero">
  <div class="container page-hero-content">
    <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="index.php">Home</a></li><li class="breadcrumb-item active">Lab Booking</li></ol></nav>
    <h1 class="mt-2"><i class="bi bi-flask text-emerald me-3"></i>Lab <span class="text-emerald">Booking</span></h1>
    <p class="text-muted-custom mt-2">Book diagnostic tests with home sample collection available.</p>
  </div>
</div>
<section>
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-7 reveal">
        <div class="form-section">
          <h3 style="font-family:'Playfair Display',serif;color:var(--white);margin-bottom:6px;">Book Lab Appointment</h3>
          <p style="color:var(--text-mute);font-size:.88rem;margin-bottom:24px;">Provide your details and we'll arrange sample collection at your home.</p>
          <?php if ($success): ?><div class="alert-success-custom mb-4"><i class="bi bi-check-circle me-2"></i><?= $success ?></div><?php endif; ?>
          <form method="POST" class="generic-form">
            <div class="row g-3">
              <div class="col-md-6"><label class="form-label">Full Name *</label><input type="text" name="name" class="form-control" placeholder="Your name" required></div>
              <div class="col-md-6"><label class="form-label">Email *</label><input type="email" name="email" class="form-control" placeholder="your@email.com" required></div>
              <div class="col-md-6"><label class="form-label">Phone Number *</label><input type="tel" name="phone" class="form-control" placeholder="+91 XXXXX XXXXX" required></div>
              <div class="col-md-6"><label class="form-label">Test Type</label>
                <select name="test" class="form-select">
                  <option value="">Select Test</option>
                  <option>Blood Sugar (Fasting)</option><option>Complete Blood Count</option>
                  <option>Lipid Profile</option><option>Thyroid Profile</option>
                  <option>HbA1c</option><option>Kidney Function Test</option>
                  <option>Liver Function Test</option><option>Urine Routine</option>
                </select>
              </div>
              <div class="col-12"><label class="form-label">Preferred Date & Time</label><input type="datetime-local" name="datetime" class="form-control"></div>
              <div class="col-12"><label class="form-label">Problem Details</label><textarea name="problem" class="form-control" rows="3" placeholder="Describe your symptoms or which tests are advised by your doctor…"></textarea></div>
              <div class="col-md-6"><label class="form-label">Collection Type</label>
                <select name="collection" class="form-select">
                  <option>Home Collection</option><option>Visit Lab</option>
                </select>
              </div>
              <div class="col-md-6"><label class="form-label">Address (for home collection)</label><input type="text" name="address" class="form-control" placeholder="Your address"></div>
              <div class="col-12"><button type="submit" class="btn-emerald w-100 justify-content-center" style="padding:13px;"><i class="bi bi-calendar-check"></i> Book Now</button></div>
            </div>
            <div class="form-feedback" style="display:none;"></div>
          </form>
        </div>
      </div>
      <div class="col-lg-5 reveal">
        <div class="glass-card p-4 mb-4">
          <h6 style="color:var(--white);font-weight:700;margin-bottom:14px;"><i class="bi bi-star-fill text-gold me-2"></i>Popular Tests</h6>
          <?php $tests = [['Blood Sugar Test','₹150','Quick turnaround'],['Complete Blood Count','₹200','Detailed analysis'],['Thyroid Profile','₹350','T3, T4, TSH'],['Lipid Profile','₹300','Cholesterol panel'],['HbA1c','₹400','3-month avg glucose']];
          foreach ($tests as $t): ?>
          <div class="d-flex justify-content-between align-items-center py-2" style="border-bottom:1px solid var(--border);">
            <div><strong style="color:var(--white);font-size:.88rem;"><?= $t[0] ?></strong><br><span style="color:var(--text-mute);font-size:.75rem;"><?= $t[2] ?></span></div>
            <span class="text-gold fw-bold"><?= $t[1] ?></span>
          </div>
          <?php endforeach; ?>
        </div>
        <div class="glass-card p-4">
          <h6 style="color:var(--white);font-weight:700;margin-bottom:12px;"><i class="bi bi-house-heart text-emerald me-2"></i>Home Collection</h6>
          <p style="color:var(--text-mute);font-size:.85rem;">Our certified phlebotomists visit your home for sample collection. Results delivered digitally within 24–48 hours.</p>
          <div class="d-flex gap-2 mt-3 flex-wrap">
            <span class="bp-status bp-normal"><i class="bi bi-check me-1"></i>Certified</span>
            <span class="bp-status bp-normal"><i class="bi bi-check me-1"></i>Free Collection</span>
            <span class="bp-status bp-normal"><i class="bi bi-check me-1"></i>Digital Reports</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include 'includes/footer.php'; ?>
