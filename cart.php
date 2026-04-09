<?php
$page_title = 'My Cart';

// Handle PHP-side order placement (when JS submits cart data via hidden input)
$orderPlaced = false;
$orderDetails = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['place_order'])) {
    $cartJson = $_POST['cart_data'] ?? '[]';
    $cartItems = json_decode($cartJson, true) ?: [];

    $name    = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email   = htmlspecialchars(trim($_POST['email'] ?? ''));
    $phone   = htmlspecialchars(trim($_POST['phone'] ?? ''));
    $address = htmlspecialchars(trim($_POST['address'] ?? ''));
    $payment = htmlspecialchars(trim($_POST['payment'] ?? 'Cash on Delivery'));
    $notes   = htmlspecialchars(trim($_POST['notes'] ?? ''));

    if ($name && $email && $phone && $address && !empty($cartItems)) {
        $orderPlaced = true;
        $orderId = 'VMS-' . strtoupper(substr(md5(time() . $name), 0, 8));
        $orderDetails = compact('orderId', 'name', 'email', 'phone', 'address', 'payment', 'notes', 'cartItems');
    }
}

include 'includes/header.php';
?>

<div class="page-hero">
  <div class="container page-hero-content">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">My Cart</li>
      </ol>
    </nav>
    <h1 class="mt-2"><i class="bi bi-cart3 text-emerald me-3"></i>My <span class="text-emerald">Cart</span></h1>
    <p class="text-muted-custom mt-2">Review your items, apply coupons, and proceed to checkout.</p>
  </div>
</div>

<section>
  <div class="container">

    <?php if ($orderPlaced && $orderDetails): ?>
    <!-- ── ORDER SUCCESS ── -->
    <div class="text-center py-5 reveal">
      <div style="width:90px;height:90px;background:rgba(0,184,148,0.12);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 24px;">
        <i class="bi bi-check-lg text-emerald" style="font-size:2.8rem;"></i>
      </div>
      <h2 style="font-family:'Playfair Display',serif;color:var(--white);">Order Placed Successfully!</h2>
      <p style="color:var(--text-mute);margin-top:8px;font-size:1rem;">Your order has been received and is being processed.</p>

      <div class="glass-card p-4 mt-5 text-start mx-auto" style="max-width:580px;">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 style="font-family:'Playfair Display',serif;color:var(--white);margin:0;">Order Summary</h5>
          <span style="background:rgba(0,184,148,0.12);color:var(--emerald);padding:4px 12px;border-radius:50px;font-size:.8rem;font-weight:700;"><?= $orderDetails['orderId'] ?></span>
        </div>
        <div class="bill-row"><span style="color:var(--text-mute);">Name</span><span><?= $orderDetails['name'] ?></span></div>
        <div class="bill-row"><span style="color:var(--text-mute);">Email</span><span><?= $orderDetails['email'] ?></span></div>
        <div class="bill-row"><span style="color:var(--text-mute);">Phone</span><span><?= $orderDetails['phone'] ?></span></div>
        <div class="bill-row"><span style="color:var(--text-mute);">Address</span><span style="max-width:60%;text-align:right;"><?= $orderDetails['address'] ?></span></div>
        <div class="bill-row"><span style="color:var(--text-mute);">Payment</span><span><?= $orderDetails['payment'] ?></span></div>
        <?php if ($orderDetails['notes']): ?>
        <div class="bill-row"><span style="color:var(--text-mute);">Notes</span><span><?= $orderDetails['notes'] ?></span></div>
        <?php endif; ?>

        <div style="border-top:1px solid var(--border);margin-top:16px;padding-top:14px;">
          <strong style="color:rgba(255,255,255,.6);font-size:.78rem;text-transform:uppercase;letter-spacing:.06em;">Items Ordered</strong>
          <?php
          $grandTotal = 0;
          foreach ($orderDetails['cartItems'] as $item):
            $price = (float) preg_replace('/[^0-9.]/', '', $item['price'] ?? '0');
            $qty   = (int)($item['qty'] ?? 1);
            $subtotal = $price * $qty;
            $grandTotal += $subtotal;
          ?>
          <div class="bill-row" style="font-size:.88rem;">
            <span style="color:var(--white);"><?= htmlspecialchars($item['name']) ?> <span style="color:var(--text-mute);">× <?= $qty ?></span></span>
            <span style="color:var(--gold);">$<?= number_format($subtotal, 2) ?></span>
          </div>
          <?php endforeach; ?>
          <div class="bill-row bill-total"><span>Grand Total</span><span>$<?= number_format($grandTotal, 2) ?></span></div>
        </div>
      </div>

      <div class="d-flex gap-3 justify-content-center mt-5 flex-wrap">
        <a href="products.php" class="btn-emerald"><i class="bi bi-bag2"></i> Continue Shopping</a>
        <button onclick="window.print()" class="btn-outline"><i class="bi bi-printer"></i> Print Receipt</button>
      </div>
    </div>

    <?php else: ?>
    <!-- ── CART PAGE ── -->

    <div class="row g-5" id="cartSection">

      <!-- Left: Cart Items -->
      <div class="col-lg-8">

        <!-- Empty State -->
        <div id="emptyCart" style="display:none;">
          <div class="text-center py-5">
            <div style="width:100px;height:100px;background:rgba(255,255,255,0.04);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 24px;border:1px solid var(--border);">
              <i class="bi bi-cart-x" style="font-size:2.5rem;color:var(--text-mute);"></i>
            </div>
            <h3 style="font-family:'Playfair Display',serif;color:var(--white);">Your cart is empty</h3>
            <p style="color:var(--text-mute);margin-top:8px;">Add some products to get started.</p>
            <a href="products.php" class="btn-emerald mt-4"><i class="bi bi-bag2"></i> Browse Products</a>
          </div>
        </div>

        <!-- Cart Items List -->
        <div id="cartItemsWrap">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 style="font-family:'Playfair Display',serif;color:var(--white);margin:0;">
              Cart Items <span id="cartItemCount" style="color:var(--text-mute);font-size:1rem;font-family:'DM Sans',sans-serif;font-weight:400;"></span>
            </h3>
            <button onclick="clearAllCart()" class="btn-outline" style="padding:7px 16px;font-size:.82rem;color:#ff7675;border-color:#ff7675;">
              <i class="bi bi-trash"></i> Clear All
            </button>
          </div>

          <div id="cartList"></div>

          <!-- Coupon Row -->
          <div class="glass-card p-4 mt-4">
            <h6 style="color:var(--white);font-weight:700;margin-bottom:14px;"><i class="bi bi-tag text-emerald me-2"></i>Apply Coupon</h6>
            <div class="d-flex gap-2">
              <input type="text" id="couponInput" class="form-control" placeholder="Enter coupon code (e.g. SAVE10)" style="max-width:280px;">
              <button onclick="applyCoupon()" class="btn-emerald" style="padding:10px 20px;white-space:nowrap;"><i class="bi bi-check2"></i> Apply</button>
            </div>
            <div id="couponMsg" style="margin-top:8px;font-size:.83rem;display:none;"></div>
            <div style="margin-top:12px;font-size:.78rem;color:var(--text-mute);">
              Available: <span style="color:var(--emerald);font-weight:600;cursor:pointer;" onclick="document.getElementById('couponInput').value='SAVE10'">SAVE10</span> (10% off) &nbsp;|&nbsp;
              <span style="color:var(--emerald);font-weight:600;cursor:pointer;" onclick="document.getElementById('couponInput').value='FLAT50'">FLAT50</span> ($5 flat off) &nbsp;|&nbsp;
              <span style="color:var(--emerald);font-weight:600;cursor:pointer;" onclick="document.getElementById('couponInput').value='FIRST20'">FIRST20</span> (20% first order)
            </div>
          </div>
        </div>
      </div>

      <!-- Right: Order Summary + Checkout -->
      <div class="col-lg-4">
        <div class="form-section" style="position:sticky;top:90px;">
          <h4 style="font-family:'Playfair Display',serif;color:var(--white);margin-bottom:20px;">Order Summary</h4>

          <div class="bill-row" style="font-size:.9rem;"><span style="color:var(--text-mute);">Subtotal</span><span id="subtotalDisplay">$0.00</span></div>
          <div class="bill-row" style="font-size:.9rem;"><span style="color:var(--text-mute);">Discount</span><span id="discountDisplay" style="color:var(--emerald);">–$0.00</span></div>
          <div class="bill-row" style="font-size:.9rem;">
            <span style="color:var(--text-mute);">Delivery</span>
            <span id="deliveryDisplay" style="color:var(--emerald);">Free</span>
          </div>
          <div class="bill-row bill-total"><span>Total</span><span id="grandTotalDisplay">$0.00</span></div>

          <!-- Delivery notice -->
          <div id="freeDeliveryNotice" style="background:rgba(0,184,148,0.08);border:1px solid rgba(0,184,148,0.2);border-radius:8px;padding:10px 14px;font-size:.8rem;color:var(--emerald);margin-top:14px;">
            <i class="bi bi-truck me-2"></i>You qualify for <strong>free delivery!</strong>
          </div>
          <div id="deliveryProgressWrap" style="display:none;margin-top:14px;">
            <div style="font-size:.78rem;color:var(--text-mute);margin-bottom:6px;">Add <strong id="remainForFree" style="color:var(--emerald);"></strong> more for free delivery</div>
            <div style="height:5px;background:rgba(255,255,255,0.08);border-radius:3px;"><div id="deliveryBar" style="height:5px;background:var(--emerald);border-radius:3px;transition:width .4s;"></div></div>
          </div>

          <div class="divider" style="margin:20px 0;"></div>

          <!-- Checkout Form -->
          <h6 style="color:var(--white);font-weight:700;margin-bottom:14px;"><i class="bi bi-person-fill text-emerald me-2"></i>Delivery Details</h6>
          <form method="POST" action="cart.php" id="checkoutForm">
            <input type="hidden" name="place_order" value="1">
            <input type="hidden" name="cart_data" id="cartDataInput">

            <div class="mb-3">
              <label class="form-label">Full Name <span class="text-emerald">*</span></label>
              <input type="text" name="name" class="form-control" placeholder="Your name" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Email <span class="text-emerald">*</span></label>
              <input type="email" name="email" class="form-control" placeholder="your@email.com" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Phone <span class="text-emerald">*</span></label>
              <input type="tel" name="phone" class="form-control" placeholder="+91 XXXXX XXXXX" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Delivery Address <span class="text-emerald">*</span></label>
              <textarea name="address" class="form-control" rows="2" placeholder="Full address with pin code" required></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label">Payment Method</label>
              <select name="payment" class="form-select">
                <option>Cash on Delivery</option>
                <option>UPI (PhonePe / GPay)</option>
                <option>Net Banking</option>
                <option>Debit / Credit Card</option>
              </select>
            </div>
            <div class="mb-4">
              <label class="form-label">Order Notes (Optional)</label>
              <textarea name="notes" class="form-control" rows="2" placeholder="Special instructions…"></textarea>
            </div>

            <button type="submit" id="placeOrderBtn" class="btn-gold w-100 justify-content-center" style="padding:14px;font-size:1rem;opacity:.5;pointer-events:none;">
              <i class="bi bi-bag-check"></i> Place Order
            </button>
            <p style="color:var(--text-mute);font-size:.75rem;text-align:center;margin-top:10px;">
              <i class="bi bi-shield-lock me-1"></i>Secure checkout. Your data is safe.
            </p>
          </form>
        </div>
      </div>
    </div>

    <!-- Suggested Products -->
    <div class="mt-5 pt-3 reveal">
      <h3 style="font-family:'Playfair Display',serif;color:var(--white);margin-bottom:24px;">You May Also Need</h3>
      <div class="row g-3">
        <?php
        $suggested = [
          ['Paracetamol 500mg',    '$25',  'pills',       'sugg-1', 'Fever & Pain Relief'],
          ['Vitamin C 1000mg',     '$299', 'capsule',     'sugg-2', 'Immunity Booster'],
          ['Sanitizer 500ml',      '$8',   'droplet',     'sugg-3', 'Personal Care'],
          ['Digital Thermometer',  '$149', 'thermometer', 'sugg-4', 'Health Device'],
          ['Cough Syrup 100ml',    '$75',  'cup-straw',   'sugg-5', 'Cold & Cough'],
          ['Glucon-D 500g',        '$99',  'lightning',   'sugg-6', 'Energy Drink'],
        ];
        foreach ($suggested as $s): ?>
        <div class="col-lg-2 col-md-4 col-6">
          <div class="product-card text-center p-3">
            <div style="width:56px;height:56px;background:rgba(0,184,148,0.1);border-radius:14px;display:flex;align-items:center;justify-content:center;margin:0 auto 10px;">
              <i class="bi bi-<?= $s[2] ?>" style="font-size:1.4rem;color:var(--emerald);"></i>
            </div>
            <div style="font-size:.82rem;font-weight:600;color:var(--white);margin-bottom:2px;"><?= $s[0] ?></div>
            <div style="font-size:.72rem;color:var(--text-mute);margin-bottom:6px;"><?= $s[4] ?></div>
            <div style="color:var(--gold);font-weight:700;font-size:.9rem;margin-bottom:10px;"><?= $s[1] ?></div>
            <button class="btn-emerald w-100 justify-content-center add-to-cart-btn"
              style="padding:7px;font-size:.78rem;"
              data-id="<?= $s[3] ?>" data-name="<?= $s[0] ?>" data-price="<?= $s[1] ?>">
              <i class="bi bi-cart-plus"></i> Add
            </button>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>

    <?php endif; ?>
  </div>
</section>

<script>
// ── CART PAGE LOGIC ──
const FREE_DELIVERY_THRESHOLD = 30;
const COUPONS = { SAVE10: { type: 'percent', value: 10 }, FLAT50: { type: 'flat', value: 5 }, FIRST20: { type: 'percent', value: 20 } };

let cart = JSON.parse(localStorage.getItem('vms_cart') || '[]');
let appliedCoupon = null;

// Normalize cart: group by id and add qty
function getNormalizedCart() {
  const map = {};
  cart.forEach(item => {
    const key = item.id || item.name;
    if (map[key]) {
      map[key].qty++;
    } else {
      map[key] = { ...item, qty: 1 };
    }
  });
  return Object.values(map);
}

function saveCart(normalized) {
  // Expand back to flat array
  const flat = [];
  normalized.forEach(item => {
    for (let i = 0; i < item.qty; i++) flat.push({ id: item.id, name: item.name, price: item.price });
  });
  cart = flat;
  localStorage.setItem('vms_cart', JSON.stringify(flat));
  const badge = document.getElementById('cartCount');
  if (badge) badge.textContent = flat.length;
}

function parsePrice(priceStr) {
  return parseFloat(String(priceStr).replace(/[^0-9.]/g, '')) || 0;
}

function renderCart() {
  const normalized = getNormalizedCart();
  const emptyEl    = document.getElementById('emptyCart');
  const wrapEl     = document.getElementById('cartItemsWrap');
  const listEl     = document.getElementById('cartList');
  const countEl    = document.getElementById('cartItemCount');
  const orderBtn   = document.getElementById('placeOrderBtn');

  if (!listEl) return;

  if (!normalized.length) {
    emptyEl.style.display = 'block';
    wrapEl.style.display  = 'none';
    updateSummary(0);
    if (orderBtn) { orderBtn.style.opacity = '.5'; orderBtn.style.pointerEvents = 'none'; }
    return;
  }

  emptyEl.style.display = 'none';
  wrapEl.style.display  = 'block';
  if (orderBtn) { orderBtn.style.opacity = '1'; orderBtn.style.pointerEvents = 'auto'; }
  if (countEl)  countEl.textContent = '(' + normalized.reduce((a,i) => a + i.qty, 0) + ' items)';

  listEl.innerHTML = normalized.map((item, idx) => {
    const price    = parsePrice(item.price);
    const subtotal = price * item.qty;
    return `
    <div class="glass-card p-4 mb-3 cart-row" data-key="${item.id || item.name}" style="transition:opacity .3s;">
      <div class="d-flex align-items-center gap-4 flex-wrap">
        <!-- Icon / Thumb -->
        <div style="width:64px;height:64px;background:rgba(0,184,148,0.08);border-radius:14px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
          <i class="bi bi-capsule" style="font-size:1.6rem;color:var(--emerald);"></i>
        </div>

        <!-- Info -->
        <div style="flex:1;min-width:150px;">
          <div style="font-weight:600;color:var(--white);font-size:.95rem;">${item.name}</div>
          <div style="color:var(--text-mute);font-size:.78rem;margin-top:2px;">Unit price: <span style="color:var(--gold);">$${price.toFixed(2)}</span></div>
        </div>

        <!-- Qty Controls -->
        <div class="d-flex align-items-center gap-2">
          <button onclick="changeQty('${item.id || item.name}', -1)"
            style="width:32px;height:32px;border-radius:8px;background:rgba(255,255,255,0.06);border:1px solid var(--border);color:var(--white);cursor:pointer;font-size:1.1rem;display:flex;align-items:center;justify-content:center;">−</button>
          <span style="min-width:28px;text-align:center;font-weight:700;color:var(--white);">${item.qty}</span>
          <button onclick="changeQty('${item.id || item.name}', 1)"
            style="width:32px;height:32px;border-radius:8px;background:rgba(255,255,255,0.06);border:1px solid var(--border);color:var(--white);cursor:pointer;font-size:1.1rem;display:flex;align-items:center;justify-content:center;">+</button>
        </div>

        <!-- Subtotal -->
        <div style="min-width:70px;text-align:right;">
          <div style="color:var(--gold);font-weight:700;font-size:1.05rem;">$${subtotal.toFixed(2)}</div>
        </div>

        <!-- Remove -->
        <button onclick="removeItem('${item.id || item.name}')"
          style="background:rgba(220,53,69,0.1);border:1px solid rgba(220,53,69,0.2);border-radius:8px;color:#ff7675;width:36px;height:36px;display:flex;align-items:center;justify-content:center;cursor:pointer;flex-shrink:0;">
          <i class="bi bi-trash3" style="font-size:.85rem;"></i>
        </button>
      </div>
    </div>`;
  }).join('');

  const subtotal = normalized.reduce((s, i) => s + parsePrice(i.price) * i.qty, 0);
  updateSummary(subtotal);
}

function updateSummary(subtotal) {
  const subtotalEl   = document.getElementById('subtotalDisplay');
  const discountEl   = document.getElementById('discountDisplay');
  const deliveryEl   = document.getElementById('deliveryDisplay');
  const grandEl      = document.getElementById('grandTotalDisplay');
  const freeNotice   = document.getElementById('freeDeliveryNotice');
  const progressWrap = document.getElementById('deliveryProgressWrap');
  const barEl        = document.getElementById('deliveryBar');
  const remainEl     = document.getElementById('remainForFree');

  let discount = 0;
  if (appliedCoupon) {
    const c = COUPONS[appliedCoupon];
    discount = c.type === 'percent' ? subtotal * (c.value / 100) : c.value;
    discount = Math.min(discount, subtotal);
  }

  const afterDiscount = subtotal - discount;
  const deliveryFee   = afterDiscount >= FREE_DELIVERY_THRESHOLD || afterDiscount === 0 ? 0 : 3;
  const grand         = afterDiscount + deliveryFee;

  if (subtotalEl)  subtotalEl.textContent  = '$' + subtotal.toFixed(2);
  if (discountEl)  discountEl.textContent  = '–$' + discount.toFixed(2);
  if (deliveryEl)  deliveryEl.textContent  = deliveryFee === 0 ? 'Free' : '$' + deliveryFee.toFixed(2);
  if (grandEl)     grandEl.textContent     = '$' + grand.toFixed(2);

  // Delivery progress
  if (subtotal > 0 && afterDiscount < FREE_DELIVERY_THRESHOLD) {
    if (freeNotice)   freeNotice.style.display   = 'none';
    if (progressWrap) progressWrap.style.display = 'block';
    const remain = FREE_DELIVERY_THRESHOLD - afterDiscount;
    if (remainEl) remainEl.textContent = '$' + remain.toFixed(2);
    if (barEl)    barEl.style.width = Math.min(100, (afterDiscount / FREE_DELIVERY_THRESHOLD) * 100) + '%';
  } else {
    if (freeNotice)   freeNotice.style.display   = subtotal > 0 ? 'block' : 'none';
    if (progressWrap) progressWrap.style.display = 'none';
  }

  // Populate hidden input for form submission
  const cartDataInput = document.getElementById('cartDataInput');
  if (cartDataInput) {
    const normalized = getNormalizedCart();
    cartDataInput.value = JSON.stringify(normalized);
  }
}

function changeQty(key, delta) {
  const normalized = getNormalizedCart();
  const item = normalized.find(i => (i.id || i.name) === key);
  if (!item) return;
  item.qty = Math.max(0, item.qty + delta);
  if (item.qty === 0) {
    removeItem(key);
    return;
  }
  saveCart(normalized);
  renderCart();
}

function removeItem(key) {
  const el = document.querySelector(`.cart-row[data-key="${key}"]`);
  if (el) { el.style.opacity = '0'; setTimeout(() => { _doRemove(key); }, 300); }
  else _doRemove(key);
}

function _doRemove(key) {
  const normalized = getNormalizedCart().filter(i => (i.id || i.name) !== key);
  saveCart(normalized);
  renderCart();
  showToast('Item removed from cart.', 'error');
}

function clearAllCart() {
  if (!confirm('Remove all items from cart?')) return;
  cart = [];
  localStorage.setItem('vms_cart', '[]');
  const badge = document.getElementById('cartCount');
  if (badge) badge.textContent = '0';
  renderCart();
}

function applyCoupon() {
  const code  = document.getElementById('couponInput').value.trim().toUpperCase();
  const msgEl = document.getElementById('couponMsg');
  msgEl.style.display = 'block';
  if (COUPONS[code]) {
    appliedCoupon = code;
    const c = COUPONS[code];
    const desc = c.type === 'percent' ? c.value + '% off' : '$' + c.value + ' off';
    msgEl.innerHTML = `<span style="color:var(--emerald);"><i class="bi bi-check-circle me-1"></i>Coupon <strong>${code}</strong> applied — ${desc}!</span>`;
    const normalized = getNormalizedCart();
    const subtotal = normalized.reduce((s, i) => s + parsePrice(i.price) * i.qty, 0);
    updateSummary(subtotal);
    showToast('Coupon applied: ' + desc);
  } else {
    appliedCoupon = null;
    msgEl.innerHTML = `<span style="color:#ff7675;"><i class="bi bi-x-circle me-1"></i>Invalid coupon code.</span>`;
    const normalized = getNormalizedCart();
    const subtotal = normalized.reduce((s, i) => s + parsePrice(i.price) * i.qty, 0);
    updateSummary(subtotal);
  }
}

// Intercept form submit — inject cart data
document.getElementById('checkoutForm')?.addEventListener('submit', function(e) {
  const normalized = getNormalizedCart();
  if (!normalized.length) { e.preventDefault(); showToast('Your cart is empty!', 'error'); return; }
  document.getElementById('cartDataInput').value = JSON.stringify(normalized);
});

// Init
renderCart();
</script>

<?php include 'includes/footer.php'; ?>
