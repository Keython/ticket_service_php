<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "ticket_service";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Include the dynamic header
include 'header.php';

// Default sort option
$sortOption = isset($_GET['sort']) ? $_GET['sort'] : null;

// Modify query based on sort option
$orderClause = "";
if ($sortOption === 'price_asc') {
    $orderClause = "ORDER BY events.price ASC";  // Sort by price in events table
} elseif ($sortOption === 'price_desc') {
    $orderClause = "ORDER BY events.price DESC"; // Sort by price in events table
}

// Search functionality
$searchQuery = isset($_GET['search']) ? $_GET['search'] : "";
$searchClause = $searchQuery ? "AND events.name LIKE '%$searchQuery%'" : "";

// Fetch events with search and sort functionality (no need for JOIN with tickets table anymore)
$query = "SELECT events.id AS event_id, events.name AS event_name, events.description AS event_description, events.date AS event_date, 
                 events.price AS event_price
          FROM events
          WHERE 1 $searchClause $orderClause";
$result = $conn->query($query);
?>

<!-- Search bar and sort dropdown -->
<div class="search-sort-container">
    <form method="get" action="index.php" class="search-form">
        <input type="text" name="search" placeholder="Meklēt pasākumu..." value="<?php echo htmlspecialchars($searchQuery); ?>">
        <button type="submit" class="btn">Meklēt</button>
        <select name="sort" onchange="this.form.submit()" class="dropdown">
            <option value="">Kārtot</option>
            <option value="price_asc" <?php echo $sortOption === 'price_asc' ? 'selected' : ''; ?>>Cena augoši</option>
            <option value="price_desc" <?php echo $sortOption === 'price_desc' ? 'selected' : ''; ?>>Cena dilstoši</option>
        </select>
    </form>
</div>

<!-- Display available events -->
<?php if ($isLoggedIn): ?>
    <h2>Pieejamie pasākumi</h2>
    <ul class="event-list">
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($event = $result->fetch_assoc()): ?>
            <li class="event-item">
                <h3><?php echo $event['event_name']; ?></h3>
                <p class="event-date"><?php echo $event['event_date']; ?></p>
                <p class="event-description"><?php echo $event['event_description']; ?></p>
                <p class="event-price">Cena: <?php echo $event['event_price']; ?> €</p> <!-- Display price from events table -->

                <!-- "Pirkt biļeti" button -->
                <a href="booking.php?id=<?php echo $event['event_id']; ?>" class="btn">Pirkt biļeti</a>
            </li>
            <?php endwhile; ?>
        <?php else: ?>
            <p>Nav pieejamu pasākumu.</p>
        <?php endif; ?>
    </ul>
<?php else: ?>
    <p>Lūdzu, autorizējieties vai reģistrējieties, lai iegādātos biļetes.</p>
<?php endif; ?>
</body>
</html>
