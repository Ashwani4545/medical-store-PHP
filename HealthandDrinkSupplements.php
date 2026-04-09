<?php
$page_title = 'Health & Drink Supplements';
include 'includes/header.php';

$products = [
  ['BOOST',                       'boost',      '$20', 'Energy Drink. Rich in Protein and Vitamins.',                   'https://m.media-amazon.com/images/I/71xgbMQ1aHL.jpg'],
  ['Horlicks Health & Nutrition', 'horlicks',   '$25', 'Fortified with essential Vitamins and Minerals.',               'https://m.media-amazon.com/images/I/61UuN4jFBpL.jpg'],
  ['Pediasure Health',            'pediasure',  '$30', 'Complete Nutrition for Kids. High in Protein.',                 'https://m.media-amazon.com/images/I/81WUBmMNYlL.jpg'],
  ["Horlicks Women's Plus",       'womens',     '$35', 'Nutrition for Women. Rich in Calcium and Vitamin D.',           'https://m.media-amazon.com/images/I/61UuN4jFBpL.jpg'],
  ['Bournvita',                   'bournvita',  '$40', 'Chocolate Health Drink. Boosts Stamina and Strength.',          'https://m.media-amazon.com/images/I/81NkZLWHDcL.jpg'],
  ['Ensure',                      'ensure',     '$40', 'Complete Balanced Nutrition. Supports Muscle Health.',          'https://m.media-amazon.com/images/I/71RIXSiMpbL.jpg'],
  ['Protinex',                    'protinex',   '$40', 'High Protein Nutrition. Supports Growth and Immunity.',         'https://via.placeholder.com/300/112240/00b894?text=Protinex'],
  ['Glucon-D Orange',             'glucond',    '$40', 'Energy Drink. Quick Source of Glucose Energy.',                 'https://via.placeholder.com/300/1d3461/f0a500?text=Glucon-D'],
  ['Nestle Milo',                 'milo',       '$40', 'Chocolate Drink Mix. Rich in Energy and Nutrients.',            'https://via.placeholder.com/300/112240/00b894?text=Milo'],
  ['Nutricharge Kids',            'nutricharge','$40', 'Multivitamin & Protein Nutrition for Growing Children.',        'https://via.placeholder.com/300/0a1628/f0a500?text=Nutricharge'],
];
?>
<div class="page-hero">
  <div class="container page-hero-content">
    <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="index.php">Home</a></li><li class="breadcrumb-item"><a href="products.php">Products</a></li><li class="breadcrumb-item active">Health Supplements</li></ol></nav>
    <h1 class="mt-2"><i class="bi bi-cup-straw text-emerald me-3"></i>Health &amp; Drink <span class="text-emerald">Supplements</span></h1>
    <p class="text-muted-custom mt-2">Premium protein drinks and nutritional supplements for all age groups.</p>
  </div>
</div>

<section>
  <div class="container">
    <div class="row g-4">
      <?php foreach ($products as $i => $p): ?>
      <div class="col-lg-3 col-md-4 col-sm-6 reveal" style="animation-delay:<?= ($i % 4) * 0.08 ?>s">
        <div class="product-card" style="position:relative;">
          <div class="product-card-img">
            <img src="<?= $p[4] ?>" alt="<?= $p[0] ?>" onerror="this.src='https://via.placeholder.com/300/112240/00b894?text=<?= urlencode($p[0]) ?>'">
          </div>
          <div class="product-card-body">
            <div class="product-card-cat">Health Supplement</div>
            <div class="product-card-name"><?= $p[0] ?></div>
            <p style="color:var(--text-mute);font-size:.78rem;margin:4px 0 10px;"><?= $p[3] ?></p>
            <div class="product-card-price"><?= $p[2] ?></div>
            <div class="product-card-actions mt-3">
              <button class="btn-emerald flex-fill justify-content-center add-to-cart-btn"
                style="flex:1;padding:9px;font-size:.85rem;"
                data-id="supp-<?= $i ?>" data-name="<?= htmlspecialchars($p[0]) ?>" data-price="<?= $p[2] ?>">
                <i class="bi bi-cart-plus"></i> Add to Cart
              </button>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <!-- Cart Summary -->
    <div class="glass-card p-4 mt-5 reveal" id="cartSummarySection" style="display:none;">
      <h5 style="font-family:'Playfair Display',serif;color:var(--white);margin-bottom:14px;"><i class="bi bi-cart3 text-emerald me-2"></i>Cart Summary</h5>
      <ul id="cartItemsList" style="list-style:none;padding:0;"></ul>
      <div class="divider"></div>
      <div class="d-flex justify-content-between align-items-center">
        <strong style="color:var(--white);">Total</strong>
        <span id="cartTotalDisplay" style="color:var(--gold);font-weight:700;font-size:1.2rem;">$0</span>
      </div>
      <div class="d-flex gap-3 mt-4">
        <a href="HomeDelivery.php" class="btn-gold flex-fill justify-content-center" style="padding:12px;"><i class="bi bi-bag-check"></i> Checkout</a>
        <button onclick="clearCart()" class="btn-outline" style="padding:12px 20px;"><i class="bi bi-trash"></i></button>
      </div>
    </div>
  </div>
</section>

<script>
let suppCart = [], suppTotal = 0;
document.querySelectorAll('.add-to-cart-btn').forEach(btn => {
  btn.addEventListener('click', function() {
    const name  = this.dataset.name;
    const price = parseFloat(this.dataset.price.replace('$',''));
    suppCart.push({name, price});
    suppTotal += price;
    updateSuppCart();
    showToast(name + ' added!');
  });
});
function updateSuppCart() {
  const sec = document.getElementById('cartSummarySection');
  const ul  = document.getElementById('cartItemsList');
  const tot = document.getElementById('cartTotalDisplay');
  sec.style.display = 'block';
  ul.innerHTML = suppCart.map(i => `<li class="d-flex justify-content-between py-2" style="border-bottom:1px solid var(--border);font-size:.88rem;"><span style="color:var(--white);">${i.name}</span><span style="color:var(--gold);">$${i.price.toFixed(2)}</span></li>`).join('');
  tot.textContent = '$' + suppTotal.toFixed(2);
}
function clearCart() { suppCart=[]; suppTotal=0; document.getElementById('cartSummarySection').style.display='none'; }
</script>
<?php include 'includes/footer.php'; ?>
