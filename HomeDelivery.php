<?php
$page_title = 'Home Delivery';
$orderSuccess = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['place_order'])) {
    $orderSuccess = true;
}
include 'includes/header.php';

$products = [
  [1, 'Paracetamol 500mg (Strip of 10)',   '₹25',  25],
  [2, 'Metformin 500mg (30 tablets)',       '₹85',  85],
  [3, 'Vitamin C 1000mg (60 tablets)',      '₹299', 299],
  [4, 'Cough Syrup 100ml',                 '₹75',  75],
  [5, 'Blood Pressure Monitor (Digital)',  '₹999', 999],
  [6, 'Glucometer Test Strips (25 strips)','₹350', 350],
];
?>
<div class="page-hero">
  <div class="container page-hero-content">
    <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="index.php">Home</a></li><li class="breadcrumb-item active">Home Delivery</li></ol></nav>
    <h1 class="mt-2"><i class="bi bi-truck text-emerald me-3"></i>Home <span class="text-emerald">Delivery</span></h1>
    <p class="text-muted-custom mt-2">Order medicines online and get them delivered to your doorstep.</p>
  </div>
</div>
<section>
  <div class="container">
    <?php if ($orderSuccess): ?>
    <div class="text-center py-5 reveal">
      <i class="bi bi-check-circle-fill text-emerald" style="font-size:4rem;"></i>
      <h2 style="font-family:'Playfair Display',serif;margin-top:20px;">Order Placed Successfully!</h2>
      <p style="color:var(--text-mute);margin-top:10px;">Your order has been received. Expected delivery in 2–4 hours.</p>
      <a href="HomeDelivery.php" class="btn-emerald mt-4"><i class="bi bi-cart"></i> Shop More</a>
    </div>
    <?php else: ?>
    <div class="row g-5">
      <div class="col-lg-7 reveal">
        <h3 style="font-family:'Playfair Display',serif;color:var(--white);margin-bottom:20px;">Available Products</h3>
        <div class="row g-3" id="productGrid">
          <?php foreach ($products as $p): ?>
          <div class="col-md-6">
            <div class="glass-card p-3 d-flex align-items-center gap-3">
              <div class="service-icon flex-shrink-0" style="width:46px;height:46px;font-size:1.1rem;"><i class="bi bi-capsule"></i></div>
              <div class="flex-grow-1">
                <div style="font-size:.88rem;font-weight:600;color:var(--white);"><?= $p[1] ?></div>
                <div class="text-gold fw-bold"><?= $p[2] ?></div>
              </div>
              <button class="btn-emerald add-to-cart-btn" style="padding:8px 14px;font-size:.8rem;"
                data-id="<?= $p[0] ?>" data-name="<?= htmlspecialchars($p[1]) ?>" data-price="<?= $p[2] ?>">
                <i class="bi bi-cart-plus"></i>
              </button>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="col-lg-5 reveal">
        <div class="form-section">
          <h4 style="font-family:'Playfair Display',serif;color:var(--white);margin-bottom:20px;"><i class="bi bi-bag text-emerald me-2"></i>Checkout</h4>
          <form method="POST" action="">
            <div class="mb-3"><label class="form-label">Full Name *</label><input type="text" name="name" class="form-control" placeholder="Delivery name" required></div>
            <div class="mb-3"><label class="form-label">Delivery Address *</label><textarea name="address" class="form-control" rows="2" placeholder="Full address with landmark" required></textarea></div>
            <div class="mb-3"><label class="form-label">Phone Number *</label><input type="tel" name="phone" class="form-control" placeholder="+91 XXXXX XXXXX" required></div>
            <div class="mb-3"><label class="form-label">Email</label><input type="email" name="email" class="form-control" placeholder="your@email.com"></div>
            <div class="mb-4"><label class="form-label">Payment Method</label>
              <select name="payment" class="form-select">
                <option>Cash on Delivery</option><option>UPI</option><option>Net Banking</option><option>Debit/Credit Card</option>
              </select>
            </div>
            <button type="submit" name="place_order" class="btn-gold w-100 justify-content-center" style="padding:13px;font-size:1rem;"><i class="bi bi-bag-check"></i> Place Order</button>
          </form>
        </div>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>
<?php include 'includes/footer.php'; ?>
