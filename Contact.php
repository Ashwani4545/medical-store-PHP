<?php
$page_title = 'Contact Us';
$success = $error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email   = htmlspecialchars(trim($_POST['email'] ?? ''));
    $phone   = htmlspecialchars(trim($_POST['phone'] ?? ''));
    $subject = htmlspecialchars(trim($_POST['subject'] ?? ''));
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));

    if ($name && $email && $message) {
        // In production: mail(...) or save to DB
        $success = "Thank you, $name! Your message has been received. We'll respond within 24 hours.";
    } else {
        $error = 'Please fill in all required fields.';
    }
}
include 'includes/header.php';
?>

<div class="page-hero">
  <div class="container page-hero-content">
    <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="index.php">Home</a></li><li class="breadcrumb-item active">Contact</li></ol></nav>
    <h1 class="mt-2">Get In <span class="text-emerald">Touch</span></h1>
    <p class="text-muted-custom mt-2">We're here to help. Reach out anytime — we respond within 24 hours.</p>
  </div>
</div>

<section>
  <div class="container">
    <div class="row g-5">
      <!-- Contact Info -->
      <div class="col-lg-4 reveal">
        <h2 class="section-title">Contact Information</h2>
        <p class="section-subtitle mt-3">Visit us, call us, or send a message.</p>
        <div class="mt-4">
          <div class="contact-info-item">
            <div class="contact-info-icon"><i class="bi bi-geo-alt-fill"></i></div>
            <div><strong style="color:var(--white);display:block;margin-bottom:4px;">Address</strong><span style="color:var(--text-mute);font-size:.88rem;">232331, Zamania (Railway Station), Ghazipur, UP, India</span></div>
          </div>
          <div class="contact-info-item">
            <div class="contact-info-icon"><i class="bi bi-telephone-fill"></i></div>
            <div><strong style="color:var(--white);display:block;margin-bottom:4px;">Phone</strong><a href="tel:+919584990009" style="color:var(--text-mute);font-size:.88rem;">+91 9584990009</a></div>
          </div>
          <div class="contact-info-item">
            <div class="contact-info-icon"><i class="bi bi-whatsapp"></i></div>
            <div><strong style="color:var(--white);display:block;margin-bottom:4px;">WhatsApp</strong><a href="https://wa.me/919584990009" style="color:var(--text-mute);font-size:.88rem;">+91 9584990009</a></div>
          </div>
          <div class="contact-info-item">
            <div class="contact-info-icon"><i class="bi bi-envelope-fill"></i></div>
            <div><strong style="color:var(--white);display:block;margin-bottom:4px;">Email</strong><a href="mailto:info@vindhyavasinimedical.com" style="color:var(--text-mute);font-size:.88rem;">info@vindhyavasinimedical.com</a></div>
          </div>
          <div class="contact-info-item">
            <div class="contact-info-icon"><i class="bi bi-clock-fill"></i></div>
            <div><strong style="color:var(--white);display:block;margin-bottom:4px;">Working Hours</strong><span style="color:var(--text-mute);font-size:.88rem;">Open 24 Hours, 7 Days a Week</span></div>
          </div>
        </div>
        <div class="mt-4">
          <strong style="color:var(--white);font-size:.85rem;text-transform:uppercase;letter-spacing:.06em;">Connect With Us</strong>
          <div class="social-links mt-3">
            <a href="https://facebook.com" target="_blank"><i class="bi bi-facebook"></i></a>
            <a href="https://twitter.com" target="_blank"><i class="bi bi-twitter-x"></i></a>
            <a href="https://instagram.com" target="_blank"><i class="bi bi-instagram"></i></a>
            <a href="https://linkedin.com" target="_blank"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>

      <!-- Contact Form -->
      <div class="col-lg-8 reveal">
        <div class="form-section">
          <h3 style="font-family:'Playfair Display',serif;color:var(--white);margin-bottom:24px;">Send Us a Message</h3>
          <?php if ($success): ?><div class="alert-success-custom mb-4"><i class="bi bi-check-circle me-2"></i><?= $success ?></div><?php endif; ?>
          <?php if ($error):   ?><div class="alert-danger-custom mb-4"><i class="bi bi-exclamation-circle me-2"></i><?= $error ?></div><?php endif; ?>
          <form method="POST" action="">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Full Name <span class="text-emerald">*</span></label>
                <input type="text" name="name" class="form-control" placeholder="Your full name" required value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
              </div>
              <div class="col-md-6">
                <label class="form-label">Email Address <span class="text-emerald">*</span></label>
                <input type="email" name="email" class="form-control" placeholder="your@email.com" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
              </div>
              <div class="col-md-6">
                <label class="form-label">Phone Number</label>
                <input type="tel" name="phone" class="form-control" placeholder="+91 XXXXX XXXXX" value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>">
              </div>
              <div class="col-md-6">
                <label class="form-label">Subject</label>
                <select name="subject" class="form-select">
                  <option value="">Select subject</option>
                  <option value="order">Order Inquiry</option>
                  <option value="service">Service Query</option>
                  <option value="prescription">Prescription Help</option>
                  <option value="complaint">Complaint</option>
                  <option value="other">Other</option>
                </select>
              </div>
              <div class="col-12">
                <label class="form-label">Message <span class="text-emerald">*</span></label>
                <textarea name="message" class="form-control" rows="5" placeholder="Write your message here…" required><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
              </div>
              <div class="col-12">
                <button type="submit" class="btn-emerald w-100 justify-content-center" style="padding:14px;"><i class="bi bi-send"></i> Send Message</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
