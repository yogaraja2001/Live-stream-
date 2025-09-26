<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="login-box">
    <h2>Admin Panel</h2>
    <form action="dashboard.php" method="post">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required style="display: none;">
        <input type="password" name="password_visible" placeholder="Password" required oninput="this.form.password.value=this.value;">
        <button type="submit">Login</button>
    </form>
</div>
</body>
</html>