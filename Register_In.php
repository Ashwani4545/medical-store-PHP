<?php
// Register_In.php (Login)
$page_title = 'Sign In';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    // Demo credentials — replace with DB check in production
    if ($username === 'user' && $password === 'password') {
        header('Location: index.php');
        exit;
    } else {
        $error = 'Invalid username or password. (Demo: user / password)';
    }
}
include 'includes/header.php';
?>
<div class="auth-wrap">
  <div class="auth-card reveal">
    <div class="auth-logo"><i class="bi bi-heart-pulse-fill"></i></div>
    <h2 class="auth-title">Welcome Back</h2>
    <p class="auth-sub">Sign in to your Vindhyavasini account</p>
    <?php if ($error): ?><div class="alert-danger-custom mb-4"><i class="bi bi-exclamation-circle me-2"></i><?= htmlspecialchars($error) ?></div><?php endif; ?>
    <form method="POST" action="">
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Enter username" required autofocus>
      </div>
      <div class="mb-4">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Enter password" required>
      </div>
      <button type="submit" class="btn-emerald w-100 justify-content-center" style="padding:13px;">
        <i class="bi bi-box-arrow-in-right"></i> Sign In
      </button>
    </form>
    <p style="text-align:center;margin-top:20px;color:var(--text-mute);font-size:.88rem;">
      Don't have an account? <a href="Register_page.php" class="text-emerald fw-bold">Register here</a>
    </p>
  </div>
</div>
<?php include 'includes/footer.php'; ?>
