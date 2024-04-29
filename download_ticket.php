<?php
session_start();
include_once 'db.php'; // Include the file that defines $conn

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: index.html"); // Redirect to login page if not logged in
    exit();
}

// Check if PNR is set in the URL
if (!isset($_GET['pnr'])) {
    echo "PNR not provided.";
    exit();
}

// Retrieve PNR from URL
$pnr = $_GET['pnr'];


$sql = "SELECT * FROM tickets WHERE PNR = '$pnr'";
$result = $conn->query($sql);

// Check if ticket exists
if ($result && $result->num_rows > 0) {
    // Ticket details found
    $ticket = $result->fetch_assoc();

    // Generate text content
    $text_content = "Ticket Details\n\n";
    $text_content .= "Passenger Name: " . $ticket['Passenger_Name'] . "\n";
    $text_content .= "Phone: " . $ticket['Phone'] . "\n";
    $text_content .= "Bus Name: " . $ticket['Bus_Name'] . "\n";
    $text_content .= "Seat: " . $ticket['Seat'] . "\n";
    $text_content .= "PNR: " . $ticket['PNR'] . "\n";
    $text_content .= "Time: " . $ticket['Time'] . "\n";

    // Set headers for download
    header('Content-Disposition: attachment; filename="ticket.txt"');
    header('Content-Type: text/plain');

    // Output the text content
    echo $text_content;
} else {
    // Ticket not found
    echo "Ticket not found.";
}
?>
