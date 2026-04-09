<?php
$page_title = 'Customer Support';
$success = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));
    if ($name && $email && $message) {
        $success = "Thank you, $name! Your message has been received. We'll respond within 2 hours.";
    }
}
include 'includes/header.php';
?>
<div class="page-hero">
  <div class="container page-hero-content">
    <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="index.php">Home</a></li><li class="breadcrumb-item active">Customer Support</li></ol></nav>
    <h1 class="mt-2"><i class="bi bi-headset text-emerald me-3"></i>24/7 Customer <span class="text-emerald">Support</span></h1>
    <p class="text-muted-custom mt-2">We're always here for you — day or night. Reach us through any channel.</p>
  </div>
</div>

<section>
  <div class="container">
    <!-- Support Channels -->
    <div class="row g-4 mb-5 reveal">
      <?php $channels = [
        ['bi-chat-dots',   'Live Chat',     'Chat with us instantly','Available now','emerald'],
        ['bi-telephone',   'Phone Support', '+91 9584990009',        '24/7 Available','gold'],
        ['bi-envelope',    'Email Support', 'info@vindhyavasinimedical.com','Reply in 2 hrs','emerald'],
        ['bi-whatsapp',    'WhatsApp',      '+91 9584990009',        'Quick responses','gold'],
      ];
      foreach ($channels as $c): ?>
      <div class="col-md-3 col-6">
        <div class="service-card text-center">
          <div class="service-icon mx-auto" style="background:rgba(<?= $c[4]==='gold'?'240,165,0':'0,184,148' ?>,0.12);color:var(--<?= $c[4] ?>);">
            <i class="<?= $c[0] ?>"></i>
          </div>
          <div class="service-title mt-2"><?= $c[1] ?></div>
          <p class="service-desc"><?= $c[2] ?></p>
          <span class="bp-status bp-normal" style="margin-top:8px;display:inline-block;"><?= $c[3] ?></span>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="row g-5">
      <!-- Contact Form -->
      <div class="col-lg-7 reveal">
        <div class="form-section">
          <h3 style="font-family:'Playfair Display',serif;color:var(--white);margin-bottom:6px;">Send Us a Message</h3>
          <p style="color:var(--text-mute);font-size:.88rem;margin-bottom:24px;">Fill in the form and our support team will get back to you promptly.</p>
          <?php if ($success): ?><div class="alert-success-custom mb-4"><i class="bi bi-check-circle me-2"></i><?= $success ?></div><?php endif; ?>
          <form method="POST" action="">
            <div class="row g-3">
              <div class="col-md-6"><label class="form-label">Your Name *</label><input type="text" name="name" class="form-control" placeholder="Full name" required value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"></div>
              <div class="col-md-6"><label class="form-label">Email Address *</label><input type="email" name="email" class="form-control" placeholder="your@email.com" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"></div>
              <div class="col-12"><label class="form-label">Issue Category</label>
                <select name="category" class="form-select">
                  <option>Order Related</option><option>Product Query</option><option>Delivery Issue</option>
                  <option>Prescription Help</option><option>Payment Problem</option><option>General Inquiry</option>
                </select>
              </div>
              <div class="col-12"><label class="form-label">Message *</label><textarea name="message" class="form-control" rows="5" placeholder="Describe your issue or question in detail…" required><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea></div>
              <div class="col-12"><button type="submit" class="btn-emerald w-100 justify-content-center" style="padding:13px;"><i class="bi bi-send"></i> Send Message</button></div>
            </div>
          </form>
        </div>
      </div>

      <!-- FAQ & Info -->
      <div class="col-lg-5 reveal">
        <div class="glass-card p-4 mb-4">
          <h5 style="color:var(--white);font-weight:700;margin-bottom:16px;"><i class="bi bi-question-circle text-emerald me-2"></i>Common Questions</h5>
          <?php $faqs = [
            ['How do I track my order?','Log in to your account and visit the Orders section to track real-time delivery status.'],
            ['Can I return a medicine?','Yes, unopened medicines within 30 days with valid receipt are eligible for return.'],
            ['How to upload prescription?','Use the Online Prescription page to upload a photo of your prescription for processing.'],
            ['What is the delivery time?','Orders within Zamania are delivered in 2–4 hours. Other areas may take 1–2 days.'],
          ];
          foreach ($faqs as $f): ?>
          <div class="faq-item">
            <button class="faq-question" style="font-size:.85rem;"><?= $f[0] ?> <span class="faq-icon">+</span></button>
            <div class="faq-answer" style="font-size:.82rem;"><?= $f[1] ?></div>
          </div>
          <?php endforeach; ?>
        </div>

        <div class="glass-card p-4">
          <h6 style="color:var(--white);font-weight:700;margin-bottom:14px;"><i class="bi bi-clock text-gold me-2"></i>Support Hours</h6>
          <div class="d-flex justify-content-between py-2" style="border-bottom:1px solid var(--border);font-size:.88rem;"><span style="color:var(--text-mute);">Phone / WhatsApp</span><span class="text-emerald fw-bold">24/7</span></div>
          <div class="d-flex justify-content-between py-2" style="border-bottom:1px solid var(--border);font-size:.88rem;"><span style="color:var(--text-mute);">Live Chat</span><span class="text-emerald fw-bold">24/7</span></div>
          <div class="d-flex justify-content-between py-2" style="font-size:.88rem;"><span style="color:var(--text-mute);">Email Response</span><span style="color:var(--gold);font-weight:600;">Within 2 hrs</span></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Live Chat Widget -->
<div class="chat-widget">
  <div class="chat-box" id="chatBox">
    <div class="chat-head"><span><i class="bi bi-headset me-2"></i>Live Support</span><button class="chat-close" id="chatClose">&times;</button></div>
    <div class="chat-messages" id="chatMessages"><div class="chat-msg bot">Hi! 👋 I'm your support assistant. How can I help you today?</div></div>
    <div class="chat-input-row"><input type="text" id="chatInput" placeholder="Type your message…"><button id="chatSendBtn"><i class="bi bi-send-fill"></i></button></div>
  </div>
  <button class="chat-btn" id="chatToggleBtn"><i class="bi bi-chat-dots-fill"></i></button>
</div>

<?php include 'includes/footer.php'; ?>
