<?php
$page_title = 'Online Consultation';
$success = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name   = htmlspecialchars(trim($_POST['name'] ?? ''));
    $doctor = htmlspecialchars(trim($_POST['doctor'] ?? ''));
    if ($name && $doctor) {
        $success = "Appointment confirmed for $name with $doctor. A confirmation SMS will be sent to your phone.";
    }
}
include 'includes/header.php';
?>

<div class="page-hero">
  <div class="container page-hero-content">
    <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="index.php">Home</a></li><li class="breadcrumb-item active">Online Consultation</li></ol></nav>
    <h1 class="mt-2"><i class="bi bi-camera-video text-emerald me-3"></i>Online <span class="text-emerald">Consultation</span></h1>
    <p class="text-muted-custom mt-2">Book video appointments with expert doctors — from the comfort of home.</p>
  </div>
</div>

<section>
  <div class="container">
    <div class="row g-5 align-items-start">
      <div class="col-lg-7 reveal">
        <div class="form-section">
          <h3 style="font-family:'Playfair Display',serif;color:var(--white);margin-bottom:6px;">Book an Appointment</h3>
          <p style="color:var(--text-mute);font-size:.88rem;margin-bottom:24px;">Fill in your details and select a doctor to confirm your video consultation.</p>

          <?php if ($success): ?>
          <div class="alert-success-custom mb-4"><i class="bi bi-check-circle me-2"></i><?= $success ?></div>
          <?php endif; ?>

          <form method="POST" action="" id="apptForm">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Full Name <span class="text-emerald">*</span></label>
                <input type="text" name="name" id="apptName" class="form-control" placeholder="Your full name" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Age <span class="text-emerald">*</span></label>
                <input type="number" name="age" id="apptAge" class="form-control" placeholder="Your age" min="1" max="120" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Gender <span class="text-emerald">*</span></label>
                <select name="gender" id="apptGender" class="form-select" required>
                  <option value="">Select Gender</option>
                  <option>Male</option><option>Female</option><option>Other</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Phone Number <span class="text-emerald">*</span></label>
                <input type="tel" name="phone" id="apptPhone" class="form-control" placeholder="+91 XXXXX XXXXX" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Email Address <span class="text-emerald">*</span></label>
                <input type="email" name="email" id="apptEmail" class="form-control" placeholder="your@email.com" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Select Doctor <span class="text-emerald">*</span></label>
                <select name="doctor" id="apptDoctor" class="form-select" required>
                  <option value="">Choose a Doctor</option>
                  <option>Dr. Sayendra (General Physician)</option>
                  <option>Dr. D.B. (Cardiologist)</option>
                  <option>Dr. Brown (Dermatologist)</option>
                  <option>Dr. Sharma (Diabetologist)</option>
                </select>
              </div>
              <div class="col-12">
                <label class="form-label">Preferred Date &amp; Time</label>
                <input type="datetime-local" name="datetime" class="form-control">
              </div>
              <div class="col-12">
                <label class="form-label">Brief Description of Issue</label>
                <textarea name="issue" class="form-control" rows="3" placeholder="Describe your symptoms or concerns…"></textarea>
              </div>
              <div class="col-12 d-flex gap-3">
                <button type="submit" class="btn-emerald flex-fill justify-content-center" style="padding:13px;"><i class="bi bi-calendar-check"></i> Confirm Appointment</button>
                <button type="reset" class="btn-outline" style="padding:13px 24px;">Cancel</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="col-lg-5 reveal">
        <h3 style="font-family:'Playfair Display',serif;color:var(--white);margin-bottom:20px;">Why Choose Online Consultation?</h3>
        <?php
        $benefits = [
          ['clock',        'Save Time',         'No waiting rooms. Consult from anywhere, anytime.'],
          ['shield-check', 'Expert Doctors',    'Connect with certified specialists across specialities.'],
          ['file-medical', 'E-Prescriptions',   'Get digital prescriptions sent directly to your phone.'],
          ['lock',         'Private & Secure',  'Your health data and consultations are fully confidential.'],
          ['currency-rupee','Affordable',       'Pay only a small consultation fee with no hidden charges.'],
        ];
        foreach ($benefits as $b): ?>
        <div class="d-flex gap-3 mb-3">
          <div class="service-icon flex-shrink-0" style="width:44px;height:44px;font-size:1rem;"><i class="bi bi-<?= $b[0] ?>"></i></div>
          <div><strong style="color:var(--white);display:block;"><?= $b[1] ?></strong><span style="color:var(--text-mute);font-size:.85rem;"><?= $b[2] ?></span></div>
        </div>
        <?php endforeach; ?>

        <div class="glass-card p-4 mt-4">
          <h6 style="color:var(--white);font-weight:700;margin-bottom:12px;"><i class="bi bi-people text-emerald me-2"></i>Available Specialists</h6>
          <?php
          $doctors = [
            ['Dr. Sayendra',  'General Physician',  '15+ yrs', 'green'],
            ['Dr. D.B.',      'Cardiologist',        '12+ yrs', 'gold'],
            ['Dr. Brown',     'Dermatologist',       '10+ yrs', 'green'],
            ['Dr. Sharma',    'Diabetologist',       '8+ yrs',  'gold'],
          ];
          foreach ($doctors as $d): ?>
          <div class="d-flex align-items-center gap-3 py-2" style="border-bottom:1px solid var(--border);">
            <div class="author-avatar" style="background:var(--<?= $d[3]==='gold'?'gold':'emerald' ?>);color:var(--navy);"><?= $d[0][3] ?></div>
            <div><strong style="color:var(--white);font-size:.9rem;"><?= $d[0] ?></strong><br><span style="color:var(--text-mute);font-size:.78rem;"><?= $d[1] ?> • <?= $d[2] ?> exp</span></div>
            <span class="bp-status bp-normal ms-auto">Available</span>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
