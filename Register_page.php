<?php
$page_title = 'Register';
$success = $error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars(trim($_POST['username'] ?? ''));
    $email    = htmlspecialchars(trim($_POST['email'] ?? ''));
    $password = $_POST['password'] ?? '';
    $confirm  = $_POST['confirm_password'] ?? '';
    if (!$username || !$email || !$password) {
        $error = 'All fields are required.';
    } elseif ($password !== $confirm) {
        $error = 'Passwords do not match.';
    } elseif (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters.';
    } else {
        // In production: save to DB
        $success = "Account created for $username! You can now sign in.";
    }
}
include 'includes/header.php';
?>
<div class="auth-wrap">
  <div class="auth-card reveal">
    <div class="auth-logo"><i class="bi bi-heart-pulse-fill"></i></div>
    <h2 class="auth-title">Create Account</h2>
    <p class="auth-sub">Join Vindhyavasini Medical Store</p>
    <?php if ($success): ?><div class="alert-success-custom mb-4"><i class="bi bi-check-circle me-2"></i><?= $success ?> <a href="Register_In.php" class="text-emerald fw-bold">Sign in now</a></div><?php endif; ?>
    <?php if ($error):   ?><div class="alert-danger-custom mb-4"><i class="bi bi-exclamation-circle me-2"></i><?= $error ?></div><?php endif; ?>
    <?php if (!$success): ?>
    <form method="POST" action="">
      <div class="mb-3"><label class="form-label">Username *</label><input type="text" name="username" class="form-control" placeholder="Choose a username" required></div>
      <div class="mb-3"><label class="form-label">Email *</label><input type="email" name="email" class="form-control" placeholder="your@email.com" required></div>
      <div class="mb-3"><label class="form-label">Password *</label><input type="password" name="password" class="form-control" placeholder="Min. 6 characters" required></div>
      <div class="mb-4"><label class="form-label">Confirm Password *</label><input type="password" name="confirm_password" class="form-control" placeholder="Repeat password" required></div>
      <button type="submit" class="btn-emerald w-100 justify-content-center" style="padding:13px;"><i class="bi bi-person-plus"></i> Register</button>
    </form>
    <?php endif; ?>
    <p style="text-align:center;margin-top:20px;color:var(--text-mute);font-size:.88rem;">
      Already have an account? <a href="Register_In.php" class="text-emerald fw-bold">Sign in</a>
    </p>
  </div>
</div>
<?php include 'includes/footer.php'; ?>
