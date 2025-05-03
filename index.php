<?php
$login_error = $_GET['error'] ?? '';
$login_success = $_GET['success'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <div class="container">
    <img src="assets/logo.png" alt="Logo" class="logo" />
    <div class="form-card">
      <?php include 'components/FormCard.php'; ?>

      <?php if ($login_error): ?>
        <p class="error"><?= htmlspecialchars($login_error) ?></p>
      <?php elseif ($login_success): ?>
        <p class="success"><?= htmlspecialchars($login_success) ?></p>
      <?php endif; ?>

      <form action="login.php" method="POST">
        <?php 
          include 'components/InputField.php';
          echo inputField("email", "Email", "email", "example@mail.com");
          echo inputField("password", "Password", "password", "••••••••");
          
          include 'components/Button.php';
          echo submitButton("Login");
        ?>
        <p style="margin-top: 10px;">Don't have an account? <a href="signup.php" style="color:#3b82f6;">Sign Up</a></p>
      </form>
    </div>
  </div>
</body>
</html>
