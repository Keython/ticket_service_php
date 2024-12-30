<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "ticket_service";

$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update user role if the form is submitted
if (isset($_POST['update_role'])) {
    $userId = $_POST['user_id'];
    $newRole = $_POST['role'];

    // Update the user's role in the database
    $updateQuery = "UPDATE users SET role = ? WHERE id = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("si", $newRole, $userId);
    $stmt->execute();
    $stmt->close();
    // Refresh the page to see the updated role
    header("Location: accounts.php");
    exit();
}

// Query to fetch user accounts
$query = "SELECT id, username, email, role FROM users";
$result = $conn->query($query);

// Include the header.php to display the navigation
include 'header.php';
?>

<!-- Page Content for User Accounts -->
<div class="container">
    <h2>Lietotāju konti</h2>

    <?php if ($result && $result->num_rows > 0): ?>
        <table class="event-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Lietotājvārds</th>
                    <th>Email</th>
                    <th>Loma</th>
                    <th>Izmainīt lomu</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['id']); ?></td>
                        <td><?php echo htmlspecialchars($user['username']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td><?php echo htmlspecialchars($user['role']); ?></td>
                        <td>
                            <!-- Form to change the user's role -->
                            <form action="accounts.php" method="post" style="display: inline;">
                                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                <select name="role" required>
                                    <option value="user" <?php echo $user['role'] === 'user' ? 'selected' : ''; ?>>User</option>
                                    <option value="admin" <?php echo $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
                                </select>
                                <button type="submit" name="update_role" class="btn">Mainīt lomu</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nav lietotāju kontu.</p>
    <?php endif; ?>

</div>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
