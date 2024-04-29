<?php
// Start session
session_start();

// Check if admin is logged in, if not redirect to login page
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("location: admin_login.php");
    exit;
}

// Include config file
require_once "db.php";
echo '<a href="search.php">Book Seat</a>';



$sql = "SELECT bus_id,bus_name,boarding_point, dropping_point, fare, seat, distance, travel_time, number_of_trip, first_trip, last_trip, bus_type FROM non_ac";
$result = mysqli_query($conn, $sql);

// Check for errors
if (!$result) {
    // Print error message and exit
    echo "Error: " . mysqli_error($conn);
    exit();
}
else {

// Initialize variables for new bus form
$new_bus_id = $new_bus_name = $new_boarding_point = $new_dropping_point = $new_fare = $new_seat = $new_distance = $new_travel_time = $new_number_of_trip = $new_first_trip = $new_last_trip = $new_bus_type = "";

$new_bus_id_err = $new_bus_name_err = $new_boarding_point_err = $new_dropping_point_err = $new_fare_err = $new_seat_err = $new_distance_err = $new_travel_time_err = $new_number_of_trip_err = $new_first_trip_err = $new_last_trip_err = $new_bus_type_err = "";

// Processing form data when form is submitted for adding new bus
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_bus'])) {

    // Validate form inputs
    $new_bus_id = trim($_POST["new_bus_id"]);
    $new_bus_name = trim($_POST["new_bus_name"]);
    $new_boarding_point = trim($_POST["new_boarding_point"]);
    $new_dropping_point = trim($_POST["new_dropping_point"]);
    $new_fare = trim($_POST["new_fare"]);
    $new_seat = trim($_POST["new_seat"]);
    $new_distance = trim($_POST["new_distance"]);
    $new_travel_time = trim($_POST["new_travel_time"]);
    $new_number_of_trip = trim($_POST["new_number_of_trip"]);
    $new_first_trip = trim($_POST["new_first_trip"]);
    $new_last_trip = trim($_POST["new_last_trip"]);
    $new_bus_type = trim($_POST["new_bus_type"]);

    // Check input errors before inserting new bus into the database
    if (empty($new_bus_id) || empty($new_bus_name) || empty($new_boarding_point) || empty($new_dropping_point) || empty($new_fare) || empty($new_seat) || empty($new_distance) || empty($new_travel_time) || empty($new_number_of_trip) || empty($new_first_trip) || empty($new_last_trip) || empty($new_bus_type)) {
        echo "Please fill all fields.";
    } else {
        // Prepare an insert statement
        $sql = "INSERT INTO non_ac (bus_id, bus_name, boarding_point, dropping_point, fare, seat, distance, travel_time, number_of_trip, first_trip, last_trip, bus_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssssss", $new_bus_id, $new_bus_name, $new_boarding_point, $new_dropping_point, $new_fare, $new_seat, $new_distance, $new_travel_time, $new_number_of_trip, $new_first_trip, $new_last_trip, $new_bus_type);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Refresh the page to display the new bus in the table
                header("location: admin_panel.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 80%; margin: 0 auto; }
        table{ width: 100%; border-collapse: collapse; }
        table, th, td{ border: 1px solid #ccc; padding: 8px; }
        th{ background-color: #f2f2f2; }
        tr:nth-child(even){ background-color: #f2f2f2; }
        .error { color: red; }
    </style>
</head>
<body>
<div class="wrapper">
    <h2>Admin Panel - Edit Bus Information</h2>
    <p>Welcome, <?php echo isset($_SESSION["username"]) ? $_SESSION["username"] : ''; ?>! You can edit, delete, or add bus information here.</p>

    <!-- Form for adding new bus -->
    <h3>Add New Bus</h3>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label>Bus Id</label>
            <input type="text" name="new_bus_id" value="<?php echo $new_bus_id; ?>">
        </div>

        <div>
            <label>Bus Name</label>
            <input type="text" name="new_bus_name" value="<?php echo $new_bus_name; ?>">
        </div>

        <div>
            <label>Boarding Point</label>
            <input type="text" name="new_boarding_point" value="<?php echo $new_boarding_point; ?>">
        </div>

        <div>
            <label>Dropping Point</label>
            <input type="text" name="new_dropping_point" value="<?php echo $new_dropping_point; ?>">
        </div>

        <div>
            <label>Fare</label>
            <input type="text" name="new_fare" value="<?php echo $new_fare; ?>">
        </div>

        <div>
            <label>Total Seat</label>
            <input type="text" name="new_seat" value="<?php echo $new_seat; ?>">
        </div>

        <div>
            <label>Distance</label>
            <input type="text" name="new_distance" value="<?php echo $new_distance; ?>">
        </div>

        <div>
            <label>Travel Time</label>
            <input type="text" name="new_travel_time" value="<?php echo $new_travel_time; ?>">
        </div>

        <div>
            <label>Number of Trip</label>
            <input type="text" name="new_number_of_trip" value="<?php echo $new_number_of_trip; ?>">
        </div>

        <div>
            <label>First Trip</label>
            <input type="text" name="new_first_trip" value="<?php echo $new_first_trip; ?>">
        </div>

        <div>
            <label>Last Trip</label>
            <input type="text" name="new_last_trip" value="<?php echo $new_last_trip; ?>">
        </div>

        <div>
            <label>Bus Type</label>
            <input type="text" name="new_bus_type" value="<?php echo $new_bus_type; ?>">
        </div>

        <div class="form-group">
            <input type="submit" name="add_bus" value="Add Bus">
        </div>
    </form>

    <!-- Table displaying existing bus information -->
    <h3>Existing Bus Information</h3>
    <table>
        <thead>
        <tr>
            <th>Bus_ID</th>
            <th>Bus_Name</th>
            <th>Boarding_Point</th>
            <th>Dropping_Point</th>
            <th>Fare</th>
            <th>Seat</th>
            <th>Distance</th>
            <th>Travel_Time</th>
            <th>Number_of_Trip</th>
            <th>First_Trip</th>
            <th>Last_Trip</th>
            <th>Bus_Type</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo isset($row['bus_id']) ? $row['bus_id'] : ''; ?></td>
                <td><?php echo isset($row['bus_name']) ? $row['bus_name'] : ''; ?></td>
                <td><?php echo isset($row['boarding_point']) ? $row['boarding_point'] : ''; ?></td>
                <td><?php echo isset($row['dropping_point']) ? $row['dropping_point'] : ''; ?></td>
                <td><?php echo isset($row['fare']) ? $row['fare'] : ''; ?></td>
                <td><?php echo isset($row['seat']) ? $row['seat'] : ''; ?></td>
                <td><?php echo isset($row['distance']) ? $row['distance'] : ''; ?></td>
                <td><?php echo isset($row['travel_time']) ? $row['travel_time'] : ''; ?></td>
                <td><?php echo isset($row['number_of_trip']) ? $row['number_of_trip'] : ''; ?></td>
                <td><?php echo isset($row['first_trip']) ? $row['first_trip'] : ''; ?></td>
                <td><?php echo isset($row['last_trip']) ? $row['last_trip'] : ''; ?></td>
                <td><?php echo isset($row['bus_type']) ? $row['bus_type'] : ''; ?></td>
                <td>
                    <a href="edit_bus.php?id=<?php echo isset($row['bus_id']) ? $row['bus_id'] : ''; ?>">Edit</a> |
                    <a href="delete.php?id=<?php echo isset($row['bus_id']) ? $row['bus_id'] : ''; ?>"
                       onclick="return confirm('Are you sure you want to delete this bus?')">Delete</a>
                </td>
            </tr>
            <?php
        }
}        
        ?>
        </tbody>
    </table>
    <p><a href="logout.php">Logout</a></p>
</div>
</body>
</html>
