<?php
$page_title = 'Chronic Disease Management';
$success = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $condition = htmlspecialchars(trim($_POST['condition'] ?? ''));
    if ($name && $condition) {
        $success = "Chronic disease management programme enrolled for $name ($condition). Our specialist will contact you within 24 hours.";
    }
}
include 'includes/header.php';
?>
<div class="page-hero">
  <div class="container page-hero-content">
    <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="index.php">Home</a></li><li class="breadcrumb-item active">Chronic Disease Management</li></ol></nav>
    <h1 class="mt-2"><i class="bi bi-clipboard2-pulse text-emerald me-3"></i>Chronic Disease <span class="text-emerald">Management</span></h1>
    <p class="text-muted-custom mt-2">Long-term care plans for managing chronic conditions with expert support and regular monitoring.</p>
  </div>
</div>

<section>
  <div class="container">
    <!-- Disease Cards -->
    <div class="row g-4 mb-5 reveal">
      <div class="col-12"><h3 style="font-family:'Playfair Display',serif;color:var(--white);">Conditions We Manage</h3></div>
      <?php $diseases = [
        ['Diabetes',        'droplet-half',      'Blood sugar monitoring, insulin management, dietary guidance, and complication prevention.', '#HbA1c every 3 months'],
        ['Hypertension',    'heart-pulse',       'BP tracking, medication management, lifestyle counselling, and risk reduction strategies.', '#Regular BP checkups'],
        ['Heart Disease',   'heart',             'Cardiac health monitoring, medication adherence support, and rehabilitation guidance.', '#Cardiologist follow-ups'],
        ['Asthma / COPD',   'lungs',             'Inhaler technique training, trigger management, and emergency action plans.', '#Peak flow monitoring'],
        ['Thyroid Disorders','activity',         'TSH monitoring, medication dosage management, and symptom tracking for hypo/hyperthyroidism.', '#Thyroid levels 3-monthly'],
        ['Arthritis',       'person-wheelchair', 'Pain management, physiotherapy guidance, anti-inflammatory medication support.', '#Joint health tracking'],
      ];
      foreach ($diseases as $d): ?>
      <div class="col-lg-4 col-md-6 reveal">
        <div class="glass-card p-4 h-100">
          <div class="service-icon" style="margin-bottom:14px;"><i class="bi bi-<?= $d[1] ?>"></i></div>
          <h5 style="font-family:'Playfair Display',serif;color:var(--white);margin-bottom:8px;"><?= $d[0] ?></h5>
          <p style="color:var(--text-mute);font-size:.85rem;line-height:1.7;margin-bottom:10px;"><?= $d[2] ?></p>
          <span style="background:rgba(0,184,148,0.1);color:var(--emerald);padding:4px 10px;border-radius:50px;font-size:.72rem;font-weight:600;"><?= $d[3] ?></span>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="row g-5">
      <div class="col-lg-6 reveal">
        <div class="form-section">
          <h3 style="font-family:'Playfair Display',serif;color:var(--white);margin-bottom:6px;">Enrol in a Care Programme</h3>
          <p style="color:var(--text-mute);font-size:.88rem;margin-bottom:24px;">Our specialists will create a personalised management plan for your condition.</p>
          <?php if ($success): ?><div class="alert-success-custom mb-4"><i class="bi bi-check-circle me-2"></i><?= $success ?></div><?php endif; ?>
          <form method="POST" action="">
            <div class="row g-3">
              <div class="col-12"><label class="form-label">Full Name *</label><input type="text" name="name" class="form-control" placeholder="Your name" required></div>
              <div class="col-md-6"><label class="form-label">Phone *</label><input type="tel" name="phone" class="form-control" placeholder="+91 XXXXX XXXXX" required></div>
              <div class="col-md-6"><label class="form-label">Email</label><input type="email" name="email" class="form-control" placeholder="your@email.com"></div>
              <div class="col-md-6"><label class="form-label">Age</label><input type="number" name="age" class="form-control" placeholder="Your age"></div>
              <div class="col-md-6"><label class="form-label">Primary Condition *</label>
                <select name="condition" class="form-select" required>
                  <option value="">Select Condition</option>
                  <option>Diabetes</option><option>Hypertension</option><option>Heart Disease</option>
                  <option>Asthma / COPD</option><option>Thyroid Disorder</option><option>Arthritis</option><option>Other</option>
                </select>
              </div>
              <div class="col-12"><label class="form-label">Current Medications</label><textarea name="medications" class="form-control" rows="2" placeholder="List your current medicines…"></textarea></div>
              <div class="col-12"><label class="form-label">Specific Concerns</label><textarea name="concerns" class="form-control" rows="3" placeholder="Describe your symptoms, challenges, or goals…"></textarea></div>
              <div class="col-12"><button type="submit" class="btn-emerald w-100 justify-content-center" style="padding:13px;"><i class="bi bi-clipboard2-check"></i> Enrol Now</button></div>
            </div>
          </form>
        </div>
      </div>

      <div class="col-lg-6 reveal">
        <h3 style="font-family:'Playfair Display',serif;color:var(--white);margin-bottom:20px;">Our Care Programme Includes</h3>
        <?php $features = [
          ['calendar-check',  'Regular Monitoring',         'Scheduled follow-ups to track disease progression and medication efficacy.'],
          ['person-check',    'Dedicated Care Manager',     'A personal health advisor to guide you through your care journey.'],
          ['bell',            'Medication Reminders',       'Timely reminders for medications, tests, and specialist appointments.'],
          ['graph-up-arrow',  'Health Progress Reports',    'Monthly health reports tracking your improvement over time.'],
          ['chat-square-text','24/7 Support Access',        'Round-the-clock access to our support team for urgent queries.'],
        ];
        foreach ($features as $f): ?>
        <div class="d-flex gap-3 mb-3">
          <div class="service-icon flex-shrink-0" style="width:44px;height:44px;font-size:1rem;"><i class="bi bi-<?= $f[0] ?>"></i></div>
          <div><strong style="color:var(--white);display:block;"><?= $f[1] ?></strong><span style="color:var(--text-mute);font-size:.85rem;"><?= $f[2] ?></span></div>
        </div>
        <?php endforeach; ?>

        <div class="glass-card p-4 mt-3" style="background:linear-gradient(135deg,rgba(0,184,148,0.08),rgba(17,34,64,0.6));">
          <strong style="color:var(--emerald);display:block;margin-bottom:8px;"><i class="bi bi-quote me-2"></i>Our Commitment</strong>
          <p style="color:var(--text-mute);font-size:.88rem;font-style:italic;line-height:1.7;">"We believe chronic conditions can be effectively managed. Our goal is to help you live a full, healthy life with the right support and guidance."</p>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include 'includes/footer.php'; ?>
