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

// Update event details if the form is submitted
if (isset($_POST['update_event'])) {
    $eventId = $_POST['event_id'];
    $eventPrice = $_POST['price'];

    // Update the event details (only price)
    $updateQuery = "UPDATE events SET price = ? WHERE id = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("di", $eventPrice, $eventId); // 'd' for price (double), 'i' for id (integer)
    $stmt->execute();
    $stmt->close();
    
    // Refresh the page to see the updated event
    header("Location: events.php");
    exit();
}

// Query to fetch events
$query = "SELECT id, name, description, price, date FROM events";
$result = $conn->query($query);

// Include the header.php to display the navigation
include 'header.php';
?>

<!-- Page Content for Events -->
<div class="event-container">
    <h2>Pasākumi</h2>

    <?php if ($result && $result->num_rows > 0): ?>
        <table class="event-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nosaukums</th>
                    <th>Apraksts</th>
                    <th>Cena</th>
                    <th>Datums</th>
                    <th>Izmainīt cenu</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($event = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($event['id']); ?></td>
                        <td><?php echo htmlspecialchars($event['name']); ?></td>
                        <td><?php echo htmlspecialchars($event['description']); ?></td>
                        <td><?php echo htmlspecialchars($event['price']); ?> €</td>
                        <td><?php echo htmlspecialchars($event['date']); ?></td>
                        <td>
                            <?php if ($userRole == 'admin'): ?>
                                <!-- Admin only: Form to change the price -->
                                <form action="events.php" method="post" style="display: inline;">
                                    <input type="hidden" name="event_id" value="<?php echo $event['id']; ?>">
                                    <input type="number" name="price" value="<?php echo $event['price']; ?>" step="0.01" required>
                                    <button type="submit" name="update_event" class="btn">Mainīt cenu</button>
                                </form>
                            <?php else: ?>
                                <p>Nav tiesību mainīt cenu</p>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nav pieejamu pasākumu.</p>
    <?php endif; ?>

</div>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>