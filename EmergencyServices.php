<?php
// EmergencyServices.php
$page_title = 'Emergency Services';
$success = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $service = htmlspecialchars(trim($_POST['service'] ?? ''));
    if ($name && $service) {
        $success = "Emergency request for $service received! Our team is being dispatched immediately. Stay calm.";
    }
}
include 'includes/header.php';
?>
<div class="page-hero" style="background:linear-gradient(135deg,#1a0a0a,#3d1010);">
  <div class="container page-hero-content">
    <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="index.php">Home</a></li><li class="breadcrumb-item active">Emergency Services</li></ol></nav>
    <h1 class="mt-2"><i class="bi bi-exclamation-octagon" style="color:#ff7675;"></i> Emergency <span style="color:#ff7675;">Services</span></h1>
    <p class="text-muted-custom mt-2">Immediate assistance available 24/7. Do not delay in an emergency.</p>
  </div>
</div>
<section>
  <div class="container">
    <!-- Emergency Numbers -->
    <div class="row g-3 mb-5 reveal">
      <?php $nums=[['Ambulance','🚑','102','For medical emergencies','red'],['Fire Brigade','🚒','101','For fire emergencies','orange'],['Police','🚓','100','For safety threats','blue'],['Medical Store','💊','+91 9584990009','24/7 pharmacy','green']];
      foreach ($nums as $n): ?>
      <div class="col-md-3 col-6">
        <div class="glass-card p-4 text-center">
          <div style="font-size:2.5rem;"><?= $n[0] ?></div>
          <div style="font-family:'Playfair Display',serif;font-size:1.5rem;font-weight:700;color:var(--gold);margin:8px 0;"><?= $n[2] ?></div>
          <div style="font-weight:600;color:var(--white);font-size:.9rem;"><?= $n[1] ?></div>
          <div style="color:var(--text-mute);font-size:.78rem;"><?= $n[3] ?></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="row g-5">
      <div class="col-lg-6 reveal">
        <div class="form-section" style="border-color:rgba(255,100,100,0.2);">
          <h3 style="font-family:'Playfair Display',serif;color:var(--white);margin-bottom:6px;">Request Emergency Service</h3>
          <p style="color:var(--text-mute);font-size:.88rem;margin-bottom:24px;">Fill this form for non-life-threatening urgent needs. For immediate danger, call 112.</p>
          <?php if ($success): ?><div class="alert-success-custom mb-4"><i class="bi bi-check-circle me-2"></i><?= $success ?></div><?php endif; ?>
          <form method="POST" action="">
            <div class="row g-3">
              <div class="col-12"><label class="form-label">Full Name *</label><input type="text" name="name" class="form-control" required placeholder="Your name"></div>
              <div class="col-12"><label class="form-label">Phone Number *</label><input type="tel" name="phone" class="form-control" required placeholder="+91 XXXXX XXXXX"></div>
              <div class="col-12"><label class="form-label">Select Service *</label>
                <select name="service" class="form-select" required>
                  <option value="">Choose service</option>
                  <option>Ambulance</option><option>Medical Assistance</option><option>Medicine Urgency</option><option>Home Visit Doctor</option>
                </select>
              </div>
              <div class="col-12"><label class="form-label">Description *</label><textarea name="description" class="form-control" rows="4" required placeholder="Describe the emergency situation…"></textarea></div>
              <div class="col-12"><label class="form-label">Current Location</label><input type="text" name="location" class="form-control" placeholder="Street, area, landmark"></div>
              <div class="col-12"><button type="submit" class="btn-emerald w-100 justify-content-center" style="padding:13px;background:#dc3545;"><i class="bi bi-exclamation-triangle"></i> Request Service Now</button></div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-lg-6 reveal">
        <div class="glass-card p-4 mb-4" style="border-color:rgba(255,100,100,0.2);">
          <h6 style="color:#ff7675;font-weight:700;margin-bottom:14px;"><i class="bi bi-info-circle me-2"></i>When to Call Emergency</h6>
          <ul style="color:var(--text-mute);font-size:.88rem;line-height:2.2;padding-left:18px;">
            <li>Chest pain, difficulty breathing, or stroke symptoms</li>
            <li>Severe bleeding or traumatic injury</li>
            <li>Loss of consciousness or seizure</li>
            <li>Suspected heart attack or severe allergic reaction</li>
            <li>Poisoning or drug overdose</li>
          </ul>
        </div>
        <div class="glass-card p-4">
          <h6 style="color:var(--white);font-weight:700;margin-bottom:12px;"><i class="bi bi-telephone text-emerald me-2"></i>Direct Emergency Contacts</h6>
          <a href="tel:102" class="btn-emerald w-100 justify-content-center mb-2" style="padding:12px;"><i class="bi bi-telephone"></i> Call Ambulance — 102</a>
          <a href="tel:+919584990009" class="btn-outline w-100 justify-content-center" style="padding:12px;"><i class="bi bi-capsule"></i> Medical Store — +91 9584990009</a>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include 'includes/footer.php'; ?>
