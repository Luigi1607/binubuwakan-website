<?php
session_start();

// Generate CSRF token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>User Registration</title>
  <style>
    /* Your existing CSS styles here */
    /* ... */
  </style>
</head>
<body>
  <div class="register-container">
    <h2>Create an Account</h2>
    <form action="register_process.php" method="POST">
      <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>" />

      <label for="regName">Username</label>
      <input type="text" id="regName" name="username" required />

      <label for="regEmail">Email Address</label>
      <input type="email" id="regEmail" name="email" required />

      <label for="regAddress">Address</label>
      <input type="text" id="regAddress" name="address" required />

      <label for="regPassword">Password</label>
      <input type="password" id="regPassword" name="password" required />

      <label for="confirmPassword">Confirm Password</label>
      <input type="password" id="confirmPassword" name="confirm_password" required />

      <button type="submit">Register</button>
    </form>

    <div class="extra">
      Already have an account? <a href="login.php">Login here</a>
    </div>
  </div>
</body>
</html>
