<?php
// Start the session and check the user's login status and role
session_start();
$isLoggedIn = isset($_SESSION['username']);
$userRole = $isLoggedIn ? $_SESSION['role'] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biļešu serviss</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
    <link rel="stylesheet" href="style_login_register.css"> <!-- Login/Register specific CSS -->
    <link rel="stylesheet" href="style_gallery_news.css"> <!-- Login/Register specific CSS -->
    <link rel="stylesheet" href="style_admin_views.css"> <!-- Login/Register specific CSS -->
</head>
<body>
<header>
    <nav>
        <ul class="navigation">
            <li><a href="index.php">Sākums</a></li>
            <?php if ($isLoggedIn): ?>
                <!-- Authorized user navigation -->
                <li><a href="gallery.php">Galerijas</a></li>
                <li><a href="survey.php">Aptauja</a></li>
                <li><a href="news.php">Ziņas</a></li>
                <?php if ($userRole == 'admin'): ?>
                    <!-- Admin-only navigation -->
                    <li><a href="accounts.php">Lietotāju konti</a></li>
                    <li><a href="events.php">Pasākumi</a></li>
                <?php else: ?>
                    <!-- Regular user navigation -->
                    <li><a href="profile.php">Profils</a></li>
                <?php endif; ?>
                <li><form action="logout.php" method="post"><button type="submit" class="btn">Atslēgties</button></form></li>
            <?php else: ?>
                <!-- Guest navigation -->
                <li><a href="gallery.php">Galerijas</a></li>
                <li><a href="survey.php">Aptauja</a></li>
                <li><a href="news.php">Ziņas</a></li>
                <li><a href="register.php" class="btn">Reģistrēties</a></li>
                <li><a href="login.php" class="btn">Pieslēgties</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
