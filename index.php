<?php
include 'config.php';
$settings = $conn->query("SELECT * FROM settings ORDER BY id DESC LIMIT 1")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
<title>Live Stream</title>
<link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="player-container">
    <video id="livePlayer" controls autoplay playsinline>
        <source src="<?= $settings['live_link'] ?>" type="application/x-mpegURL">
    </video>

    <?php if($settings['logo_path']): ?>
    <img src="<?= $settings['logo_path'] ?>" class="logo">
    <?php endif; ?>

    <?php if($settings['show_live']): ?>
    <div class="live-label">நேரலை</div>
    <?php endif; ?>

    <?php if($settings['show_time']): ?>
    <div class="time-label" id="timeLabel"></div>
    <script>
        setInterval(()=>{
            document.getElementById("timeLabel").innerText = new Date().toLocaleTimeString();
        },1000);
    </script>
    <?php endif; ?>

    <div class="watermark" style="font-size: <?= $settings['watermark_size'] ?>px;">
        <?= $settings['watermark_text'] ?>
    </div>
</div>
</body>
</html>