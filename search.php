<?php
session_start();
include_once 'db.php'; 

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php"); 
    exit();
}

// Fetch available buses based on boarding point, dropping point, and bus name (if provided)
$boarding_point = $_GET['boarding_point'] ?? '';
$dropping_point = $_GET['dropping_point'] ?? '';
$bus_name = $_GET['bus_name'] ?? '';

$sql = "SELECT * FROM non_ac WHERE Boarding_Point = '$boarding_point' AND Dropping_Point = '$dropping_point'";
if (!empty($bus_name)) {
    $sql .= " AND Bus_Name = '$bus_name'";
}
$result = $conn->query($sql);

if ($result === false) {
    die("Error executing query: " . $conn->error);
}

// CSS styles for bus information and button
echo "
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }
  .bus-info {
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 20px;
    position: relative;
  }
  .bus-info h3 {
    margin-top: 0;
  }
  .book-seat-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 8px 16px;
    border-radius: 5px;
    text-decoration: none;
  }
</style>
";

// Display available buses
if ($result->num_rows > 0) {
    echo "<h2>Available Buses</h2>";
    while ($row = $result->fetch_assoc()) {
        // Display bus information and booking link
        $bus_id = $row["Bus_ID"];
        $bus_name = $row["Bus_Name"];
        $bus_type = $row["Bus_Type"];
        $fare = $row["Fare"];

        // Fetch the number of seats booked for this bus
        $sql_booked_seats = "SELECT COUNT(*) as booked_seats FROM tickets WHERE Bus_Name = '$bus_name'";
        $result_booked_seats = $conn->query($sql_booked_seats);
        $booked_seats = $result_booked_seats->fetch_assoc()['booked_seats'];

        // Calculate the number of available seats
        $number_of_trip = $row["Number_of_Trip"];
        $total_seats = 40; // Assuming there are 40 seats in total 
        $available_seats = $total_seats - $booked_seats;
        if($available_seats>0){


            echo "<div class='bus-info'>";
            echo "<h3>Bus Name: " . $bus_name . "</h3>";
            echo "Type: " . $bus_type . "<br>";
            echo "Distance: " . $row["Distance"] . "<br>";
            echo "Boarding Point: " . $row["Boarding_Point"] . "<br>";
            echo "Dropping Point: " . $row["Dropping_Point"] . "<br>";
            echo "Fare: " . $fare . "<br>";
            echo "Available Seats: " . $available_seats . "<br>";
            echo "<a href='book_seat.php?bus_id=" . $bus_id . "&boarding_point=" . $boarding_point . "&dropping_point=" .$dropping_point. "&bus_name=" . $bus_name . "&bus_type=" . $bus_type . "&fare=" . $fare .  "' class='book-seat-btn'>Book Seat</a>";
            echo "</div>";
        }

        else{
            echo " No seat available";
        }
    }
} else {
    echo "No buses available for the selected criteria.";
}
?>
