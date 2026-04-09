<?php
$page_title = 'Vaccine Administration';
$success = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $vaccine = htmlspecialchars(trim($_POST['vaccine'] ?? ''));
    if ($name && $vaccine) {
        $success = "Vaccine appointment booked for $name — $vaccine. We'll send a reminder before your appointment.";
    }
}
include 'includes/header.php';
?>
<div class="page-hero">
  <div class="container page-hero-content">
    <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="index.php">Home</a></li><li class="breadcrumb-item active">Vaccine Administration</li></ol></nav>
    <h1 class="mt-2"><i class="bi bi-shield-plus text-emerald me-3"></i>Vaccine <span class="text-emerald">Administration</span></h1>
    <p class="text-muted-custom mt-2">Get vaccinated on schedule. Protect yourself, your family, and your community.</p>
  </div>
</div>

<section>
  <div class="container">
    <!-- Vaccines available -->
    <div class="row g-3 mb-5 reveal">
      <div class="col-12"><h3 style="font-family:'Playfair Display',serif;color:var(--white);">Available Vaccines</h3></div>
      <?php $vaccines = [
        ['COVID-19 Booster',  'shield-fill-check', 'Annual booster dose for ongoing COVID-19 protection.'],
        ['Flu (Influenza)',   'wind',              'Seasonal flu vaccine for all age groups.'],
        ['Hepatitis B',       'droplet-half',      'Three-dose protection against Hepatitis B virus.'],
        ['Typhoid',           'thermometer-half',  'Protection against typhoid fever, valid for 3 years.'],
        ['Tetanus (TT)',      'bandaid',           'Essential for wound injuries and routine immunization.'],
        ['Pneumococcal',      'lungs',             'Pneumonia prevention for elderly and high-risk groups.'],
      ];
      foreach ($vaccines as $v): ?>
      <div class="col-lg-4 col-md-6">
        <div class="glass-card p-3 d-flex gap-3 align-items-center">
          <div class="service-icon flex-shrink-0" style="width:46px;height:46px;font-size:1.1rem;"><i class="bi bi-<?= $v[1] ?>"></i></div>
          <div><strong style="color:var(--white);font-size:.9rem;"><?= $v[0] ?></strong><br><span style="color:var(--text-mute);font-size:.78rem;"><?= $v[2] ?></span></div>
          <span class="bp-status bp-normal ms-auto flex-shrink-0">Available</span>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="row g-5">
      <div class="col-lg-6 reveal">
        <div class="form-section">
          <h3 style="font-family:'Playfair Display',serif;color:var(--white);margin-bottom:6px;">Book Vaccine Appointment</h3>
          <p style="color:var(--text-mute);font-size:.88rem;margin-bottom:24px;">Schedule your vaccination at our store or request a home visit.</p>
          <?php if ($success): ?><div class="alert-success-custom mb-4"><i class="bi bi-check-circle me-2"></i><?= $success ?></div><?php endif; ?>
          <form method="POST" action="">
            <div class="row g-3">
              <div class="col-12"><label class="form-label">Full Name *</label><input type="text" name="name" class="form-control" placeholder="Your name" required></div>
              <div class="col-md-6"><label class="form-label">Email *</label><input type="email" name="email" class="form-control" required placeholder="your@email.com"></div>
              <div class="col-md-6"><label class="form-label">Phone *</label><input type="tel" name="phone" class="form-control" required placeholder="+91 XXXXX XXXXX"></div>
              <div class="col-md-6"><label class="form-label">Age</label><input type="number" name="age" class="form-control" placeholder="Your age" min="1" max="120"></div>
              <div class="col-md-6"><label class="form-label">Gender</label>
                <select name="gender" class="form-select"><option>Male</option><option>Female</option><option>Other</option></select>
              </div>
              <div class="col-12"><label class="form-label">Select Vaccine *</label>
                <select name="vaccine" class="form-select" required>
                  <option value="">Choose Vaccine</option>
                  <option>COVID-19 Booster</option><option>Flu (Influenza)</option>
                  <option>Hepatitis B</option><option>Typhoid</option>
                  <option>Tetanus (TT)</option><option>Pneumococcal</option>
                </select>
              </div>
              <div class="col-12"><label class="form-label">Preferred Date & Time</label><input type="datetime-local" name="datetime" class="form-control"></div>
              <div class="col-12"><label class="form-label">Location Preference</label>
                <select name="location_pref" class="form-select"><option>Visit Store</option><option>Home Visit (extra charge applies)</option></select>
              </div>
              <div class="col-12"><label class="form-label">Additional Notes</label><textarea name="message" class="form-control" rows="2" placeholder="Allergies, medical conditions, or notes…"></textarea></div>
              <div class="col-12"><button type="submit" class="btn-emerald w-100 justify-content-center" style="padding:13px;"><i class="bi bi-calendar-check"></i> Book Appointment</button></div>
            </div>
          </form>
        </div>
      </div>

      <div class="col-lg-6 reveal">
        <h3 style="font-family:'Playfair Display',serif;color:var(--white);margin-bottom:20px;">Why Vaccinate?</h3>
        <?php $reasons = [
          ['shield-check',   'Prevent Serious Illness',   'Vaccines dramatically reduce the risk of severe disease and hospitalisation.'],
          ['people',         'Protect Your Community',    'Herd immunity protects vulnerable people who cannot be vaccinated.'],
          ['clock-history',  'Long-lasting Protection',   'Many vaccines provide years or even lifetime protection with proper scheduling.'],
          ['hospital',       'Reduce Healthcare Costs',   'Prevention is far less expensive than treatment of vaccine-preventable diseases.'],
        ];
        foreach ($reasons as $r): ?>
        <div class="glass-card p-3 mb-3 d-flex gap-3 align-items-start">
          <div class="service-icon flex-shrink-0" style="width:44px;height:44px;font-size:1rem;"><i class="bi bi-<?= $r[0] ?>"></i></div>
          <div><strong style="color:var(--white);display:block;"><?= $r[1] ?></strong><span style="color:var(--text-mute);font-size:.85rem;"><?= $r[2] ?></span></div>
        </div>
        <?php endforeach; ?>

        <div class="glass-card p-4 mt-4" style="background:linear-gradient(135deg,rgba(0,184,148,0.08),transparent);">
          <h6 style="color:var(--white);font-weight:700;margin-bottom:10px;"><i class="bi bi-info-circle text-gold me-2"></i>Important Notice</h6>
          <p style="color:var(--text-mute);font-size:.85rem;line-height:1.7;">Please bring your vaccination card and a valid ID to your appointment. Inform our staff of any known allergies or prior adverse reactions to vaccines.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include 'includes/footer.php'; ?>
