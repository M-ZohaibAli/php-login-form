<?php
$signup_error = $_GET['error'] ?? '';
$signup_success = $_GET['success'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign Up</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <div class="container">
    <img src="assets/logo.svg" alt="Logo" class="logo" />
    <div class="form-card">
      <h2>Create an Account 📝</h2>
      <p>Sign up to get started</p>

      <?php if ($signup_error): ?>
        <p class="error"><?= htmlspecialchars($signup_error) ?></p>
      <?php elseif ($signup_success): ?>
        <p class="success"><?= htmlspecialchars($signup_success) ?></p>
      <?php endif; ?>

      <form action="register.php" method="POST">
        <?php 
          include 'components/InputField.php';
          include 'components/Button.php';

          echo inputField("name", "Name", "text", "John Doe");
          echo inputField("email", "Email", "email", "you@example.com");
          echo inputField("password", "Password", "password", "••••••••");

          echo submitButton("Sign Up");
        ?>
      </form>
      <p style="margin-top: 10px;">Already have an account? <a href="index.php" style="color:#3b82f6;">Login</a></p>
    </div>
  </div>
</body>
</html>
