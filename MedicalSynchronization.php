<?php
$page_title = 'Medical Synchronization';
$success = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    if ($name) $success = "Thank you, $name! Your wellness programme has been synchronised. Check your email for the full schedule.";
}
include 'includes/header.php';
?>
<div class="page-hero">
  <div class="container page-hero-content">
    <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="index.php">Home</a></li><li class="breadcrumb-item active">Medical Synchronization</li></ol></nav>
    <h1 class="mt-2"><i class="bi bi-arrow-repeat text-emerald me-3"></i>Medical <span class="text-emerald">Synchronization</span></h1>
    <p class="text-muted-custom mt-2">Sync your wellness programmes, medication schedules, and health monitoring in one place.</p>
  </div>
</div>

<section>
  <div class="container">
    <!-- Services Offered -->
    <div class="row g-4 mb-5 reveal">
      <?php $services=[
        ['Wellness Program',       'heart-fill',      'Personalised wellness plans with regular health check-in reminders.'],
        ['Nutritional Counselling','egg-fried',       'Sync your dietary plans with your medication schedule and health goals.'],
        ['BP Monitoring',          'heart-pulse',     'Automated blood pressure tracking alerts integrated with your health history.'],
        ['Telemedicine',           'camera-video',    'Seamlessly connect teleconsultations with your ongoing health records.'],
        ['Lab Results Sync',       'flask',           'Get lab reports automatically synced to your health profile.'],
        ['Medication Reminders',   'bell-fill',       'Never miss a dose — customisable medication alerts sent via SMS/email.'],
      ];
      foreach ($services as $s): ?>
      <div class="col-lg-4 col-md-6 reveal">
        <div class="service-card">
          <div class="service-icon"><i class="bi bi-<?= $s[1] ?>"></i></div>
          <div class="service-title"><?= $s[0] ?></div>
          <p class="service-desc"><?= $s[2] ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="row g-5">
      <div class="col-lg-6 reveal">
        <div class="form-section">
          <h3 style="font-family:'Playfair Display',serif;color:var(--white);margin-bottom:6px;">Sync Your Health Programme</h3>
          <p style="color:var(--text-mute);font-size:.88rem;margin-bottom:24px;">Register to sync your wellness plan, prescriptions, and monitoring schedules.</p>
          <?php if ($success): ?><div class="alert-success-custom mb-4"><i class="bi bi-check-circle me-2"></i><?= $success ?></div><?php endif; ?>
          <form method="POST" action="">
            <div class="row g-3">
              <div class="col-12"><label class="form-label">Full Name *</label><input type="text" name="name" class="form-control" required placeholder="Your name"></div>
              <div class="col-md-6"><label class="form-label">Email *</label><input type="email" name="email" class="form-control" required placeholder="your@email.com"></div>
              <div class="col-md-6"><label class="form-label">Phone</label><input type="tel" name="phone" class="form-control" placeholder="+91 XXXXX XXXXX"></div>
              <div class="col-12"><label class="form-label">Services to Sync</label>
                <div class="row g-2 mt-1">
                  <?php foreach (['Wellness Program','Nutritional Counselling','BP Monitoring','Telemedicine','Lab Reports','Medication Reminders'] as $svc): ?>
                  <div class="col-6">
                    <label style="display:flex;align-items:center;gap:8px;cursor:pointer;color:var(--text-mute);font-size:.85rem;">
                      <input type="checkbox" name="services[]" value="<?= $svc ?>" style="accent-color:var(--emerald);width:16px;height:16px;">
                      <?= $svc ?>
                    </label>
                  </div>
                  <?php endforeach; ?>
                </div>
              </div>
              <div class="col-12"><label class="form-label">Message</label><textarea name="message" class="form-control" rows="3" placeholder="Any specific requirements or notes…"></textarea></div>
              <div class="col-12"><button type="submit" class="btn-emerald w-100 justify-content-center" style="padding:13px;"><i class="bi bi-arrow-repeat"></i> Synchronize Now</button></div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-lg-6 reveal">
        <div class="glass-card p-5 text-center" style="background:linear-gradient(135deg,rgba(0,184,148,0.08),transparent);">
          <i class="bi bi-diagram-3-fill" style="font-size:4rem;color:var(--emerald);"></i>
          <h3 style="font-family:'Playfair Display',serif;margin-top:20px;">One Unified Health Hub</h3>
          <p style="color:var(--text-mute);margin-top:12px;line-height:1.8;">All your health data, appointments, prescriptions, and monitoring results — accessible in one secure, synchronised platform.</p>
          <div class="row g-3 mt-3">
            <?php foreach([['Secure','lock-fill'],['Private','eye-slash-fill'],['24/7 Access','clock-fill']] as $b): ?>
            <div class="col-4">
              <div class="service-icon mx-auto mb-1" style="width:40px;height:40px;font-size:.9rem;"><i class="bi bi-<?= $b[1] ?>"></i></div>
              <div style="font-size:.78rem;color:var(--text-mute);"><?= $b[0] ?></div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include 'includes/footer.php'; ?>
