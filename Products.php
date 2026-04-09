<?php
$page_title = 'Products';
$search   = htmlspecialchars($_GET['q'] ?? '');
$category = htmlspecialchars($_GET['cat'] ?? '');
include 'includes/header.php';

$products = [
  ['Health Supplements',  'Boost Energy Drink',        '$20',  'https://m.media-amazon.com/images/I/71xgbMQ1aHL.jpg', 'supplements', 'Popular'],
  ['Health Supplements',  'Horlicks Nutrition Drink',  '$25',  'https://m.media-amazon.com/images/I/61UuN4jFBpL.jpg', 'supplements', ''],
  ['Health Supplements',  'Pediasure Kids',            '$30',  'https://m.media-amazon.com/images/I/81WUBmMNYlL.jpg', 'supplements', 'Kids'],
  ['Health Supplements',  "Horlicks Women's Plus",     '$35',  'https://m.media-amazon.com/images/I/61UuN4jFBpL.jpg', 'supplements', ''],
  ['Health Supplements',  'Bournvita Health Drink',    '$40',  'https://m.media-amazon.com/images/I/81NkZLWHDcL.jpg', 'supplements', 'Bestseller'],
  ['Health Supplements',  'Ensure Nutrition Drink',    '$40',  'https://m.media-amazon.com/images/I/71RIXSiMpbL.jpg', 'supplements', ''],
  ['Diabetes',            'Metformin 500mg',           '$15',  'https://via.placeholder.com/300/112240/00b894?text=Metformin', 'diabetes', 'Rx'],
  ['Diabetes',            'Glipizide Tablets',         '$18',  'https://via.placeholder.com/300/112240/00b894?text=Glipizide', 'diabetes', 'Rx'],
  ['Blood Pressure',      'Amlodipine 5mg',            '$12',  'https://via.placeholder.com/300/1d3461/f0a500?text=Amlodipine', 'bp', 'Rx'],
  ['Blood Pressure',      'Atenolol 50mg',             '$10',  'https://via.placeholder.com/300/1d3461/f0a500?text=Atenolol', 'bp', 'Rx'],
  ['Personal Care',       'Sanitizer 500ml',           '$8',   'https://via.placeholder.com/300/112240/00b894?text=Sanitizer', 'personal', ''],
  ['Personal Care',       'First Aid Kit',             '$35',  'https://via.placeholder.com/300/112240/00b894?text=First+Aid', 'personal', 'Essential'],
  ['Ayurveda',            'Ashwagandha Capsules',      '$22',  'https://via.placeholder.com/300/0a1628/f0a500?text=Ashwagandha', 'ayurveda', 'Natural'],
  ['Ayurveda',            'Triphala Churna',           '$15',  'https://via.placeholder.com/300/0a1628/f0a500?text=Triphala', 'ayurveda', 'Natural'],
  ['Baby Care',           'Johnson Baby Powder',       '$12',  'https://via.placeholder.com/300/1d3461/ffffff?text=Baby+Powder', 'baby', ''],
  ['Baby Care',           'Gripe Water',               '$9',   'https://via.placeholder.com/300/1d3461/ffffff?text=Gripe+Water', 'baby', ''],
];

// Filter
if ($search || $category) {
  $products = array_filter($products, function($p) use ($search, $category) {
    $matchSearch   = !$search   || stripos($p[1], $search) !== false || stripos($p[0], $search) !== false;
    $matchCategory = !$category || $p[4] === $category;
    return $matchSearch && $matchCategory;
  });
}
?>

<div class="page-hero">
  <div class="container page-hero-content">
    <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="index.php">Home</a></li><li class="breadcrumb-item active">Products</li></ol></nav>
    <h1 class="mt-2">Our <span class="text-emerald">Products</span></h1>
    <p class="text-muted-custom mt-2">Quality medicines and healthcare products at your fingertips.</p>
  </div>
</div>

<section>
  <div class="container">
    <!-- Filters -->
    <form method="GET" class="glass-card p-4 mb-5 reveal">
      <div class="row g-3 align-items-end">
        <div class="col-md-5">
          <label class="form-label">Search Products</label>
          <input type="text" name="q" class="form-control" placeholder="Search by name…" value="<?= $search ?>">
        </div>
        <div class="col-md-4">
          <label class="form-label">Category</label>
          <select name="cat" class="form-select">
            <option value="">All Categories</option>
            <option value="supplements" <?= $category==='supplements'?'selected':'' ?>>Health Supplements</option>
            <option value="diabetes"    <?= $category==='diabetes'?'selected':'' ?>>Diabetes Medicines</option>
            <option value="bp"          <?= $category==='bp'?'selected':'' ?>>Blood Pressure</option>
            <option value="personal"    <?= $category==='personal'?'selected':'' ?>>Personal Care</option>
            <option value="ayurveda"    <?= $category==='ayurveda'?'selected':'' ?>>Ayurveda</option>
            <option value="baby"        <?= $category==='baby'?'selected':'' ?>>Baby Care</option>
          </select>
        </div>
        <div class="col-md-3 d-flex gap-2">
          <button type="submit" class="btn-emerald flex-fill justify-content-center"><i class="bi bi-search"></i> Search</button>
          <a href="products.php" class="btn-outline flex-fill justify-content-center">Clear</a>
        </div>
      </div>
    </form>

    <!-- Results -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <p style="color:var(--text-mute);">Showing <strong style="color:var(--white)"><?= count($products) ?></strong> products</p>
    </div>

    <?php if (empty($products)): ?>
    <div class="text-center py-5">
      <i class="bi bi-search" style="font-size:3rem;color:var(--text-mute)"></i>
      <p class="mt-3" style="color:var(--text-mute)">No products found. Try a different search.</p>
      <a href="products.php" class="btn-emerald mt-3">View All Products</a>
    </div>
    <?php else: ?>
    <div class="row g-4">
      <?php foreach ($products as $i => $p): ?>
      <div class="col-lg-3 col-md-4 col-sm-6 reveal" style="animation-delay:<?= ($i % 4) * 0.08 ?>s">
        <div class="product-card">
          <?php if ($p[5]): ?><span style="position:absolute;top:12px;left:12px;background:var(--emerald);color:#fff;padding:3px 10px;border-radius:50px;font-size:.72rem;font-weight:700;z-index:1;"><?= $p[5] ?></span><?php endif; ?>
          <div class="product-card-img">
            <img src="<?= $p[3] ?>" alt="<?= $p[1] ?>" onerror="this.src='https://via.placeholder.com/300/112240/00b894?text=<?= urlencode($p[1]) ?>'">
          </div>
          <div class="product-card-body">
            <div class="product-card-cat"><?= $p[0] ?></div>
            <div class="product-card-name"><?= $p[1] ?></div>
            <div class="product-card-price"><?= $p[2] ?></div>
            <div class="product-card-actions mt-3">
              <button class="btn-emerald flex-fill justify-content-center add-to-cart-btn" style="flex:1;padding:9px;"
                data-name="<?= $p[1] ?>" data-price="<?= $p[2] ?>" data-id="<?= $i ?>">
                <i class="bi bi-cart-plus"></i> Add
              </button>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
</section>

<div class="chat-widget">
  <div class="chat-box" id="chatBox"><div class="chat-head"><span><i class="bi bi-headset me-2"></i>Live Support</span><button class="chat-close" id="chatClose">&times;</button></div><div class="chat-messages" id="chatMessages"><div class="chat-msg bot">Hi! 👋 Need help finding a product?</div></div><div class="chat-input-row"><input type="text" id="chatInput" placeholder="Type a message…"><button id="chatSendBtn"><i class="bi bi-send-fill"></i></button></div></div>
  <button class="chat-btn" id="chatToggleBtn"><i class="bi bi-chat-dots-fill"></i></button>
</div>

<?php include 'includes/footer.php'; ?>
