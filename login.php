<?php
//session_start();
include 'config.php';

// Include the dynamic header
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if user exists
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            echo "<div class='message success'>Pieslēgšanās veiksmīga. <a href='index.php'>Uz sākumu.</a></div>";
        } else {
            echo "<div class='message'>Nepareiza parole. <a href='login.php'>Mēģiniet vēlreiz</a></div>";
        }
    } else {
        echo "<div class='message'>Lietotājs nepastāv. <a href='register.php'>Reģistrējieties šeit</a></div>";
    }
}
?>

<div class="container">
    <div class="login-card">
        <h2>Pieslēgties</h2>
        <form class="login-form" method="post">
            Lietotājvārds: <input type="text" name="username" required><br>
            Parole: <input type="password" name="password" required><br>
            <button type="submit">Pieslēgties</button>
        </form>
    </div>
</div>
