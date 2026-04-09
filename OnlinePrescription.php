<?php
$page_title = 'Online Prescription';
$success = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['fullName'] ?? ''));
    $address = htmlspecialchars(trim($_POST['address'] ?? ''));
    if ($name && $address) {
        $success = "Order placed for $name! Your medicines will be delivered to the provided address. Order ID: #VMS-" . strtoupper(substr(md5(time()), 0, 6));
    }
}
include 'includes/header.php';
?>
<div class="page-hero">
  <div class="container page-hero-content">
    <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="index.php">Home</a></li><li class="breadcrumb-item active">Online Prescription</li></ol></nav>
    <h1 class="mt-2"><i class="bi bi-file-medical text-emerald me-3"></i>Online <span class="text-emerald">Prescription</span></h1>
    <p class="text-muted-custom mt-2">Upload your prescription and order medicines without stepping out.</p>
  </div>
</div>

<section>
  <div class="container">
    <div class="row g-5">
      <!-- Search & Cart -->
      <div class="col-lg-7 reveal">
        <div class="form-section mb-4">
          <h4 style="font-family:'Playfair Display',serif;color:var(--white);margin-bottom:16px;"><i class="bi bi-search text-emerald me-2"></i>Search Medicine</h4>
          <div class="d-flex gap-2 mb-3">
            <input type="text" id="medicineSearch" class="form-control" placeholder="Type medicine name…">
            <button onclick="searchMedicine()" class="btn-emerald" style="padding:10px 18px;white-space:nowrap;"><i class="bi bi-search"></i> Search</button>
          </div>
          <div id="searchResults"></div>
        </div>

        <div class="form-section mb-4">
          <h4 style="font-family:'Playfair Display',serif;color:var(--white);margin-bottom:16px;"><i class="bi bi-upload text-emerald me-2"></i>Upload Prescription</h4>
          <div style="border:2px dashed var(--border);border-radius:var(--radius);padding:32px;text-align:center;cursor:pointer;" onclick="document.getElementById('prescFile').click()">
            <i class="bi bi-cloud-upload" style="font-size:2.5rem;color:var(--emerald);"></i>
            <p style="color:var(--text-mute);margin-top:10px;font-size:.9rem;">Click to upload or drag & drop your prescription</p>
            <p style="color:var(--text-mute);font-size:.78rem;">Supports JPG, PNG, PDF up to 5MB</p>
            <input type="file" id="prescFile" style="display:none;" accept="image/*,.pdf" onchange="handleFile(this)">
          </div>
          <div id="filePreview" style="display:none;" class="mt-3"></div>
        </div>

        <!-- Cart -->
        <div class="glass-card p-4">
          <h5 style="font-family:'Playfair Display',serif;color:var(--white);margin-bottom:14px;"><i class="bi bi-cart3 text-emerald me-2"></i>Your Cart</h5>
          <div id="cartItems" style="min-height:60px;color:var(--text-mute);font-size:.88rem;">No items added yet.</div>
          <div class="divider" style="margin:14px 0;"></div>
          <div class="d-flex justify-content-between align-items-center">
            <strong style="color:var(--white);">Total</strong>
            <span id="cartTotal" style="color:var(--gold);font-weight:700;font-size:1.1rem;">₹0</span>
          </div>
        </div>
      </div>

      <!-- Delivery & Order -->
      <div class="col-lg-5 reveal">
        <div class="form-section">
          <h4 style="font-family:'Playfair Display',serif;color:var(--white);margin-bottom:16px;"><i class="bi bi-geo-alt text-emerald me-2"></i>Delivery Details</h4>
          <?php if ($success): ?><div class="alert-success-custom mb-4"><i class="bi bi-check-circle me-2"></i><?= $success ?></div><?php endif; ?>
          <form method="POST" action="">
            <div class="mb-3"><label class="form-label">Full Name *</label><input type="text" name="fullName" class="form-control" placeholder="Recipient's name" required></div>
            <div class="mb-3"><label class="form-label">Delivery Address *</label><textarea name="address" class="form-control" rows="3" placeholder="Full address with pin code" required></textarea></div>
            <div class="mb-3"><label class="form-label">Phone Number *</label><input type="tel" name="phone" class="form-control" placeholder="+91 XXXXX XXXXX" required></div>
            <div class="mb-4"><label class="form-label">Payment Method</label>
              <select name="payment" class="form-select">
                <option>Cash on Delivery</option><option>UPI (PhonePe / GPay)</option><option>Net Banking</option><option>Debit / Credit Card</option>
              </select>
            </div>
            <button type="submit" class="btn-gold w-100 justify-content-center" style="padding:13px;font-size:1rem;"><i class="bi bi-bag-check"></i> Place Order</button>
          </form>
        </div>

        <div class="glass-card p-4 mt-4">
          <h6 style="color:var(--white);font-weight:700;margin-bottom:12px;"><i class="bi bi-info-circle text-emerald me-2"></i>Important Notes</h6>
          <ul style="color:var(--text-mute);font-size:.82rem;line-height:2;padding-left:16px;">
            <li>Prescription medicines require a valid doctor's prescription.</li>
            <li>Our pharmacist will verify the prescription before dispatch.</li>
            <li>Substitutes may be suggested if prescribed brand is unavailable.</li>
            <li>Delivery within Zamania: 2–4 hours. Other areas: 1–2 days.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
const medicines = [
  {name:'Paracetamol 500mg', price:25, qty:'Strip of 10'},
  {name:'Metformin 500mg',   price:85, qty:'30 tablets'},
  {name:'Amlodipine 5mg',    price:60, qty:'30 tablets'},
  {name:'Atorvastatin 10mg', price:120,qty:'15 tablets'},
  {name:'Pantoprazole 40mg', price:75, qty:'15 tablets'},
  {name:'Cetirizine 10mg',   price:30, qty:'10 tablets'},
  {name:'Azithromycin 500mg',price:150,qty:'3 tablets'},
  {name:'Vitamin D3 1000IU', price:200,qty:'60 tablets'},
];
let cart = [];

function searchMedicine() {
  const q = document.getElementById('medicineSearch').value.toLowerCase();
  const res = document.getElementById('searchResults');
  if (!q) { res.innerHTML = ''; return; }
  const filtered = medicines.filter(m => m.name.toLowerCase().includes(q));
  if (!filtered.length) { res.innerHTML = '<p style="color:var(--text-mute);font-size:.85rem;">No results found.</p>'; return; }
  res.innerHTML = filtered.map(m => `
    <div class="d-flex align-items-center justify-content-between p-2 mb-1" style="background:rgba(255,255,255,0.04);border-radius:8px;">
      <div><strong style="color:var(--white);font-size:.88rem;">${m.name}</strong><br><span style="color:var(--text-mute);font-size:.75rem;">${m.qty} — <span style="color:var(--gold);">₹${m.price}</span></span></div>
      <button onclick="addToCart('${m.name}',${m.price})" class="btn-emerald" style="padding:6px 14px;font-size:.78rem;"><i class="bi bi-plus"></i> Add</button>
    </div>`).join('');
}

function addToCart(name, price) {
  const existing = cart.find(i => i.name === name);
  if (existing) { existing.qty++; } else { cart.push({name, price, qty:1}); }
  updateCart();
  showToast(name + ' added to cart!');
}

function updateCart() {
  const el = document.getElementById('cartItems');
  const totalEl = document.getElementById('cartTotal');
  if (!cart.length) { el.innerHTML = '<span style="color:var(--text-mute);">No items added yet.</span>'; totalEl.textContent = '₹0'; return; }
  let total = 0;
  el.innerHTML = cart.map((i,idx) => {
    total += i.price * i.qty;
    return `<div class="d-flex justify-content-between align-items-center mb-2" style="font-size:.85rem;">
      <span style="color:var(--white);">${i.name} × ${i.qty}</span>
      <div class="d-flex align-items-center gap-2">
        <span style="color:var(--gold);">₹${i.price * i.qty}</span>
        <button onclick="removeFromCart(${idx})" style="background:none;border:none;color:#ff7675;cursor:pointer;font-size:.9rem;"><i class="bi bi-x-circle"></i></button>
      </div>
    </div>`;
  }).join('');
  totalEl.textContent = '₹' + total;
}

function removeFromCart(idx) { cart.splice(idx,1); updateCart(); }

function handleFile(input) {
  if (!input.files.length) return;
  const file = input.files[0];
  document.getElementById('filePreview').style.display = 'block';
  document.getElementById('filePreview').innerHTML = `<div class="alert-success-custom"><i class="bi bi-file-check me-2"></i>Prescription uploaded: <strong>${file.name}</strong></div>`;
}

document.getElementById('medicineSearch').addEventListener('keypress', function(e) {
  if (e.key === 'Enter') { e.preventDefault(); searchMedicine(); }
});
</script>
<?php include 'includes/footer.php'; ?>
