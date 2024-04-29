<?php
session_start();
include_once 'db.php'; 

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: index.html"); 
    exit();
}


$pnr = $_GET['pnr'];

$sql = "SELECT * FROM tickets WHERE PNR = '$pnr'";

// Check if PNR is set in the URL
if (!isset($_GET['pnr'])) {
    echo "PNR not provided.";
    exit();
}

// Retrieve PNR from URL


// Retrieve ticket details from the database based on PNR

$result = $conn->query($sql);

// Check if ticket exists
if ($result && $result->num_rows > 0) {
    // Ticket details found
    $ticket = $result->fetch_assoc();

    echo "<h2>Ticket Details</h2>";
    echo "<p>Passenger Name: " . $ticket['Passenger_Name'] . "</p>";
    echo "<p>Phone: " . $ticket['Phone'] . "</p>";
    echo "<p>Bus Name: " . $ticket['Bus_Name'] . "</p>";
    echo "<p>Seat: " . $ticket['Seat'] . "</p>";
    echo "<p>PNR: " . $ticket['PNR'] . "</p>";
    echo "<p>Time: " . $ticket['Time'] . "</p>";

    echo "<a href='download_ticket.php?pnr=$pnr'>Download Ticket</a>";
} else {
    // Ticket not found
    echo "Ticket not found.";
}
?>
