<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $res = $conn->query("SELECT * FROM admin WHERE username='$username' AND password='$password'");
    if ($res->num_rows > 0) {
        $_SESSION['admin'] = $username;
    } else {
        die("Invalid login");
    }
}

if (!isset($_SESSION['admin'])) {
    header("Location: admin.php");
    exit;
}

$settings = $conn->query("SELECT * FROM settings ORDER BY id DESC LIMIT 1")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet" href="assets/style.css">
</head>
<body>
<h2>Admin Dashboard</h2>
<a href="logout.php">Logout</a>
<form action="save_settings.php" method="post" enctype="multipart/form-data">
    <label>Live Link</label>
    <input type="text" name="live_link" value="<?= $settings['live_link'] ?>"><br>

    <label>Upload Logo</label>
    <input type="file" name="logo"><br>

    <label>Show “நேரலை”</label>
    <input type="checkbox" name="show_live" <?= $settings['show_live'] ? "checked" : "" ?>><br>

    <label>Watermark Text</label>
    <input type="text" name="watermark_text" value="<?= $settings['watermark_text'] ?>"><br>

    <label>Watermark Size</label>
    <input type="number" name="watermark_size" value="<?= $settings['watermark_size'] ?>"><br>

    <label>Show Time</label>
    <input type="checkbox" name="show_time" <?= $settings['show_time'] ? "checked" : "" ?>><br>

    <button type="submit">Save</button>
</form>

<p>Generated Live Link:</p>
<code>http://yourdomain.com/livetv/index.php</code>
</body>
</html>