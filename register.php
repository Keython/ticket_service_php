<?php
include 'config.php';
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encrypt password
    $email = $_POST['email'];
    $role = $_POST['role'] === 'admin' ? 'admin' : 'user'; // Assign role

    // Check if username or email already exists
    $checkQuery = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        echo "Lietotājvārds vai e-pasts jau pastāv. <a href='register.php'>Mēģiniet vēlreiz.</a>";
    } else {
        // Insert new user into database
        $sql = "INSERT INTO users (username, password, email, role) VALUES ('$username', '$password', '$email', '$role')";
        if ($conn->query($sql) === TRUE) {
            echo "Reģistrēšanās veiksmīga. <a href='login.php'>Pieslēgties</a>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>
<div class="container">
    <div class="register-card">
        <h2>Reģistrēties</h2>
            <form method="post">
                Lietotājvārds: <input type="text" name="username" required><br>
                Parole: <input type="password" name="password" required><br>
                E-pasts: <input type="email" name="email" required><br>
                Konta veids: 
                <select name="role">
                    <option value="user">Lietotājs</option>
                    <option value="admin">Administrators</option>
                </select><br>
                <button type="submit">Reģistrēties</button>
            </form>
    </div>
</div>            
