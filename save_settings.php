<?php
session_start();
include 'config.php';

if (!isset($_SESSION['admin'])) { die("Unauthorized"); }

$live_link = $_POST['live_link'];
$show_live = isset($_POST['show_live']) ? 1 : 0;
$watermark_text = $_POST['watermark_text'];
$watermark_size = $_POST['watermark_size'];
$show_time = isset($_POST['show_time']) ? 1 : 0;

$logo_path = "";
if (!empty($_FILES['logo']['name'])) {
    $logo_path = "uploads/" . time() . "_" . basename($_FILES['logo']['name']);
    move_uploaded_file($_FILES['logo']['tmp_name'], $logo_path);
}

$sql = "INSERT INTO settings (live_link, logo_path, show_live, watermark_text, watermark_size, show_time)
        VALUES ('$live_link', '$logo_path', '$show_live', '$watermark_text', '$watermark_size', '$show_time')";

$conn->query($sql);

header("Location: dashboard.php");
?>