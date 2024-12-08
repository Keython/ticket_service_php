<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "ticket_service";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['username']);
$userRole = $isLoggedIn ? $_SESSION['role'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Biļešu serviss</title>
</head>

<body>
    <h1>Biļešu Serviss</h1>

    <!-- Display content based on login status -->
    <?php if ($isLoggedIn): ?>
        <p>Welcome, <strong><?php echo $_SESSION['username']; ?></strong> (<?php echo $_SESSION['role']; ?>)</p>
        <?php if ($userRole == 'admin'): ?>
            <p><a href="create_event.php">Create Event</a></p>
        <?php endif; ?>
        <p><a href="logout.php">Logout</a></p>

        <h2>Available Tickets</h2>
        <ul>
            <?php
            // Fetch tickets from the database
            $query = "SELECT events.name AS event_name, events.date AS event_date, tickets.id, tickets.price 
                      FROM tickets 
                      JOIN events ON tickets.event_id = events.id";
            $result = $conn->query($query);

            if ($result && $result->num_rows > 0):
                while ($ticket = $result->fetch_assoc()):
            ?>
            <li>
                <strong><?php echo $ticket['event_name']; ?></strong> - <?php echo $ticket['event_date']; ?>
                (Price: $<?php echo $ticket['price']; ?>)
                <a href="booking.php?id=<?php echo $ticket['id']; ?>">Book Now</a>
            </li>
            <?php endwhile; else: ?>
            <p>No tickets available.</p>
            <?php endif; ?>
        </ul>

    <?php else: ?>
        <h2>Login</h2>
        <form method="post" action="login.php">
            Username: <input type="text" name="username" required><br>
            Password: <input type="password" name="password" required><br>
            <button type="submit">Login</button>
        </form>

        <h2>Register</h2>
        <form method="post" action="register.php">
            Username: <input type="text" name="username" required><br>
            Password: <input type="password" name="password" required><br>
            Email: <input type="email" name="email" required><br>
            Role:
            <select name="role">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select><br>
            <button type="submit">Register</button>
        </form>
    <?php endif; ?>
</body>
</html>
