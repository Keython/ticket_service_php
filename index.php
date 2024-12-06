<?php
include 'includes/db.php';

$query = "SELECT * FROM tickets";
$stmt = $conn->prepare($query);
$stmt->execute();
$tickets = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ticket Service</title>
</head>
<body>
    <h1>Available Tickets</h1>
    <ul>
        <?php foreach ($tickets as $ticket): ?>
        <li>
            <strong><?php echo $ticket['event_name']; ?></strong> - <?php echo $ticket['event_date']; ?>
            (Price: $<?php echo $ticket['price']; ?>)
            <a href="booking.php?id=<?php echo $ticket['id']; ?>">Book Now</a>
        </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
