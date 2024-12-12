<?php
include 'header.php';
include 'config.php';

// Get the logged-in user's username from the session
$username = $_SESSION['username'];

// Fetch user and ticket information
$query = "
    SELECT 
        users.username, 
        users.email, 
        tickets.purchase_date, 
        events.name AS event_name, 
        events.description AS event_description 
    FROM users
    LEFT JOIN tickets ON users.id = tickets.user_id
    LEFT JOIN events ON tickets.event_id = events.id
    WHERE users.username = ?
";

$stmt = $conn->prepare($query);
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();

// Check if user data is found
if ($result->num_rows > 0) {
    $user_data = $result->fetch_assoc(); // Fetch first row for header details
} else {
    $user_data = null; // No tickets or events found
}
?>

<div class="tickets-container">
    <div class="tickets-section">
        <?php if ($user_data): ?>
            <p>Lietotājvārds: <?php echo htmlspecialchars($_SESSION['username']); ?></p>
            <p>E-pasts: <?php echo htmlspecialchars($user_data['email']); ?></p>
            <h3>Tavas iegādātās biļetes:</h3>
            <ul class="inline-event-list">
                <?php
                // Display ticket details inline
                do {
                    if ($user_data['event_name']): ?>
                        <li class="inline-event-item">
                            <h3><?php echo htmlspecialchars($user_data['event_name']); ?></h3>
                            <p class="event-description"><?php echo htmlspecialchars($user_data['event_description']); ?></p>
                            <p class="event-date">Nopirkts: <?php echo htmlspecialchars($user_data['purchase_date']); ?></p>
                        </li>
                    <?php endif;
                } while ($user_data = $result->fetch_assoc());
                ?>
            </ul>
        <?php else: ?>
            <p>Jūs vēl neesat iegādājies nevienu biļeti.</p>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
