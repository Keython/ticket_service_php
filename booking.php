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

// Get the event ID from the URL parameter
$event_id = isset($_GET['id']) ? $_GET['id'] : null;
$user_id = 1; // Replace this with actual logged-in user ID (usually from session)

if ($event_id) {
    // Fetch event details from the database based on the event ID
    $query = "SELECT * FROM events WHERE id = $event_id LIMIT 1";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $event = $result->fetch_assoc();
    } else {
        echo "Pasākums netika atrasts.";
        exit;
    }
} else {
    echo "Nav pasākuma ID.";
    exit;
}

// Handle form submission to book the ticket
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form values
    $event_id = $_POST['event_id'];
    $user_id = $_POST['user_id'];
    $purchase_date = date('Y-m-d H:i:s'); // Current date and time for purchase

    // Insert booking data into the tickets table
    $insert_query = "INSERT INTO tickets (event_id, user_id, purchase_date) VALUES ($event_id, $user_id, '$purchase_date')";
    
    if ($conn->query($insert_query) === TRUE) {
        echo "Pirkums ir veiksmīgs!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biļetes - <?php echo $event['name']; ?></title>
    <link rel="stylesheet" href="style.css"> <!-- Link your main CSS file -->
</head>
<body>
    <div class="container">
        <div class="booking-card">
            <h2>Pirkt biļeti uz: <?php echo $event['name']; ?></h2>
            <p><strong>Datums:</strong> <?php echo $event['date']; ?></p>
            <p><strong>Apraksts:</strong> <?php echo $event['description']; ?></p>
            <p class="event-price">Cena: <?php echo $event['price']; ?> €</p> <!-- Display price from events table -->

            <!-- Booking form -->
            <form class="booking-form" method="post" action="booking.php?id=<?php echo $event['id']; ?>">
                <!-- Hidden fields to pass event ID and user ID -->
                <input type="hidden" name="event_id" value="<?php echo $event['id']; ?>">
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"> <!-- Assume user ID is stored in session -->

                <button type="submit">Pirkt</button>
            </form>
        </div>
    </div>
</body>
</html>
