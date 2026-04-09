<?php
$page_title = 'BP Monitoring';
include 'includes/header.php';
?>

<div class="page-hero">
  <div class="container page-hero-content">
    <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="index.php">Home</a></li><li class="breadcrumb-item"><a href="index.php#services">Services</a></li><li class="breadcrumb-item active">BP Monitoring</li></ol></nav>
    <h1 class="mt-2"><i class="bi bi-heart-pulse text-emerald me-3"></i>Blood Pressure <span class="text-emerald">Monitoring</span></h1>
    <p class="text-muted-custom mt-2">Track and manage your blood pressure readings in one place.</p>
  </div>
</div>

<section>
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-5 reveal">
        <div class="form-section">
          <h3 style="font-family:'Playfair Display',serif;color:var(--white);margin-bottom:6px;">Record a Reading</h3>
          <p style="color:var(--text-mute);font-size:.88rem;margin-bottom:24px;">Enter your blood pressure values to track your health.</p>
          <form id="bpForm">
            <div class="mb-3">
              <label class="form-label">Systolic Pressure (mmHg) <span class="text-emerald">*</span></label>
              <input type="number" id="systolic" class="form-control" placeholder="e.g. 120" min="60" max="250" required>
              <div style="font-size:.75rem;color:var(--text-mute);margin-top:4px;">Upper number — pressure when heart beats</div>
            </div>
            <div class="mb-4">
              <label class="form-label">Diastolic Pressure (mmHg) <span class="text-emerald">*</span></label>
              <input type="number" id="diastolic" class="form-control" placeholder="e.g. 80" min="40" max="150" required>
              <div style="font-size:.75rem;color:var(--text-mute);margin-top:4px;">Lower number — pressure when heart rests</div>
            </div>
            <button type="submit" class="btn-emerald w-100 justify-content-center" style="padding:13px;"><i class="bi bi-plus-circle"></i> Record Reading</button>
          </form>
        </div>

        <!-- BP Guide -->
        <div class="glass-card p-4 mt-4">
          <h6 style="color:var(--white);font-weight:700;margin-bottom:14px;"><i class="bi bi-info-circle text-emerald me-2"></i>BP Reference Guide</h6>
          <div style="font-size:.83rem;">
            <div class="d-flex justify-content-between py-2" style="border-bottom:1px solid var(--border);">
              <span style="color:var(--text-mute);">Normal</span><span class="bp-status bp-normal">Below 120/80</span>
            </div>
            <div class="d-flex justify-content-between py-2" style="border-bottom:1px solid var(--border);">
              <span style="color:var(--text-mute);">Elevated</span><span class="bp-status bp-low">120–129/&lt;80</span>
            </div>
            <div class="d-flex justify-content-between py-2" style="border-bottom:1px solid var(--border);">
              <span style="color:var(--text-mute);">High Stage 1</span><span class="bp-status bp-high">130–139/80–89</span>
            </div>
            <div class="d-flex justify-content-between py-2">
              <span style="color:var(--text-mute);">High Stage 2</span><span class="bp-status bp-high">140+/90+</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-7 reveal">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h3 style="font-family:'Playfair Display',serif;color:var(--white);">Your Readings</h3>
          <button onclick="localStorage.removeItem('vms_bp');location.reload();" class="btn-outline" style="padding:7px 16px;font-size:.8rem;">
            <i class="bi bi-trash"></i> Clear All
          </button>
        </div>
        <ul id="bpList">
          <li class="text-muted-custom text-center py-5">No readings recorded yet. Add your first reading!</li>
        </ul>

        <div class="glass-card p-4 mt-4">
          <h6 style="color:var(--white);font-weight:700;margin-bottom:12px;"><i class="bi bi-lightbulb text-gold me-2"></i>Healthy Tips</h6>
          <ul style="color:var(--text-mute);font-size:.88rem;padding-left:18px;line-height:2;">
            <li>Monitor BP at the same time every day for consistency.</li>
            <li>Avoid caffeine or exercise 30 min before measuring.</li>
            <li>Sit quietly for 5 minutes before taking a reading.</li>
            <li>Measure in both arms and use the higher reading.</li>
            <li>Consult your doctor if readings are consistently high.</li>
          </ul>
          <a href="OnlineConsultation.php" class="btn-emerald mt-3"><i class="bi bi-camera-video"></i> Consult a Doctor</a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
