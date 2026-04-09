<?php
$page_title = 'Medical Equipment Rental';
$rentalData = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_rental'])) {
    $rates = ['Wheelchair' => 20, 'Crutches' => 10, 'Hospital Bed' => 50, 'Walker' => 15, 'CPAP Machine' => 30];
    $eq  = htmlspecialchars($_POST['equipment'] ?? '');
    $dur = (int)($_POST['duration'] ?? 0);
    $rentalData = [
        'name'     => htmlspecialchars($_POST['name'] ?? ''),
        'email'    => htmlspecialchars($_POST['email'] ?? ''),
        'phone'    => htmlspecialchars($_POST['phone'] ?? ''),
        'altPhone' => htmlspecialchars($_POST['altPhone'] ?? ''),
        'equipment'=> $eq,
        'duration' => $dur,
        'cost'     => ($rates[$eq] ?? 0) * $dur,
        'rate'     => $rates[$eq] ?? 0,
    ];
}
include 'includes/header.php';
?>

<div class="page-hero">
  <div class="container page-hero-content">
    <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="index.php">Home</a></li><li class="breadcrumb-item active">Equipment Rental</li></ol></nav>
    <h1 class="mt-2"><i class="bi bi-tools text-emerald me-3"></i>Medical Equipment <span class="text-emerald">Rental</span></h1>
    <p class="text-muted-custom mt-2">Rent quality medical equipment affordably for your recovery and care needs.</p>
  </div>
</div>

<section>
  <div class="container">
    <!-- Equipment Showcase -->
    <div class="row g-3 mb-5 reveal">
      <?php
      $equip = [
        ['Wheelchair',    'wheelchair',  '$20/day', 'Foldable, lightweight wheelchair for mobility assistance.'],
        ['Crutches',      'person-walking', '$10/day', 'Adjustable aluminum crutches for post-surgery recovery.'],
        ['Hospital Bed',  'hospital',    '$50/day', 'Electric hospital bed with adjustable height and backrest.'],
        ['Walker',        'arrow-up-right-square', '$15/day', 'Sturdy folding walker for elderly and rehabilitation.'],
        ['CPAP Machine',  'lungs',       '$30/day', 'CPAP therapy machine for sleep apnea management.'],
      ];
      foreach ($equip as $e): ?>
      <div class="col-lg col-md-4 col-6">
        <div class="equipment-card">
          <i class="bi bi-<?= $e[1] ?>"></i>
          <div style="font-weight:600;color:var(--white);font-size:.9rem;"><?= $e[0] ?></div>
          <div class="text-gold" style="font-size:.85rem;font-weight:700;"><?= $e[2] ?></div>
          <div style="color:var(--text-mute);font-size:.75rem;margin-top:6px;"><?= $e[3] ?></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="row g-5">
      <div class="col-lg-6 reveal">
        <div class="form-section">
          <h3 style="font-family:'Playfair Display',serif;color:var(--white);margin-bottom:6px;">Rental Request</h3>
          <p style="color:var(--text-mute);font-size:.88rem;margin-bottom:24px;">Fill in your details to book equipment rental.</p>
          <form method="POST" action="" id="rentalForm">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Full Name <span class="text-emerald">*</span></label>
                <input type="text" name="name" class="form-control" placeholder="Your name" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Email <span class="text-emerald">*</span></label>
                <input type="email" name="email" class="form-control" placeholder="your@email.com" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Phone No. <span class="text-emerald">*</span></label>
                <input type="tel" name="phone" class="form-control" placeholder="+91 XXXXX XXXXX" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Alternate Phone <span class="text-emerald">*</span></label>
                <input type="tel" name="altPhone" class="form-control" placeholder="Alternate number" required>
              </div>
              <div class="col-12">
                <label class="form-label">Select Equipment <span class="text-emerald">*</span></label>
                <select name="equipment" id="equipment" class="form-select" required>
                  <option value="">Choose Equipment</option>
                  <option>Wheelchair</option>
                  <option>Crutches</option>
                  <option>Hospital Bed</option>
                  <option>Walker</option>
                  <option>CPAP Machine</option>
                </select>
              </div>
              <div class="col-12">
                <label class="form-label">Rental Duration (days) <span class="text-emerald">*</span></label>
                <input type="number" name="duration" id="duration" class="form-control" placeholder="Number of days" min="1" max="365" required>
                <div id="costPreview" style="color:var(--emerald);font-size:.85rem;margin-top:6px;font-weight:600;"></div>
              </div>
              <div class="col-12 d-flex gap-2">
                <button type="submit" name="submit_rental" class="btn-emerald flex-fill justify-content-center" style="padding:12px;"><i class="bi bi-bag-check"></i> Rent Now</button>
                <button type="reset" class="btn-outline" style="padding:12px 20px;">Clear</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="col-lg-6 reveal">
        <?php if ($rentalData): ?>
        <!-- Rental Details Card -->
        <div id="rentalDetails">
          <div class="bill-card mb-4">
            <h4 style="font-family:'Playfair Display',serif;color:var(--white);margin-bottom:20px;"><i class="bi bi-receipt text-emerald me-2"></i>Rental Summary</h4>
            <div class="bill-row"><span style="color:var(--text-mute);">Name</span><span><?= $rentalData['name'] ?></span></div>
            <div class="bill-row"><span style="color:var(--text-mute);">Email</span><span><?= $rentalData['email'] ?></span></div>
            <div class="bill-row"><span style="color:var(--text-mute);">Phone</span><span><?= $rentalData['phone'] ?></span></div>
            <div class="bill-row"><span style="color:var(--text-mute);">Alt. Phone</span><span><?= $rentalData['altPhone'] ?></span></div>
            <div class="bill-row"><span style="color:var(--text-mute);">Equipment</span><span><?= $rentalData['equipment'] ?></span></div>
            <div class="bill-row"><span style="color:var(--text-mute);">Duration</span><span><?= $rentalData['duration'] ?> days × $<?= $rentalData['rate'] ?>/day</span></div>
            <div class="bill-row bill-total"><span>Total Cost</span><span>$<?= $rentalData['cost'] ?></span></div>
          </div>
          <form method="POST" action="">
            <?php foreach ($_POST as $k => $v): ?>
            <input type="hidden" name="<?= htmlspecialchars($k) ?>" value="<?= htmlspecialchars($v) ?>">
            <?php endforeach; ?>
            <div class="d-flex gap-3">
              <button type="submit" name="pay_now" class="btn-gold flex-fill justify-content-center" style="padding:13px;"><i class="bi bi-credit-card"></i> Pay Now</button>
              <button type="button" onclick="window.print()" class="btn-outline" style="padding:13px 20px;"><i class="bi bi-printer"></i></button>
            </div>
          </form>
        </div>
        <?php elseif (isset($_POST['pay_now'])): ?>
        <div class="alert-success-custom p-5 text-center" style="border-radius:var(--radius);">
          <i class="bi bi-check-circle-fill" style="font-size:3rem;display:block;margin-bottom:16px;"></i>
          <h4 style="font-family:'Playfair Display',serif;">Payment Successful!</h4>
          <p style="margin-top:10px;">Your equipment is booked. Please collect it from our store at your convenience.</p>
          <a href="MedicineEquipmentRent.php" class="btn-emerald mt-3">Book Another</a>
        </div>
        <?php else: ?>
        <div class="glass-card p-4">
          <h5 style="color:var(--white);font-weight:700;margin-bottom:16px;"><i class="bi bi-info-circle text-emerald me-2"></i>Rental Policy</h5>
          <ul style="color:var(--text-mute);font-size:.88rem;line-height:2;padding-left:18px;">
            <li>Security deposit required for equipment above $30/day.</li>
            <li>Minimum rental period is 1 day.</li>
            <li>Free delivery for rentals of 7+ days within Zamania.</li>
            <li>Equipment must be returned in original condition.</li>
            <li>24-hour cancellation policy applies.</li>
          </ul>
          <div class="divider"></div>
          <h6 style="color:var(--white);margin-bottom:12px;"><i class="bi bi-telephone text-emerald me-2"></i>Need Help?</h6>
          <p style="color:var(--text-mute);font-size:.85rem;">Call us at <a href="tel:+919584990009" class="text-emerald">+91 9584990009</a> for equipment availability and custom rental packages.</p>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
