<?php
// Start session
session_start();

// Check if admin is logged in, if not redirect to login page
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("location: admin_login.php");
    exit;
}

// Include config file
require_once "db.php"; // Change to correct database connection file name

// Check if bus_id parameter is set and is a valid integer
if(isset($_GET["bus_id"]) && is_numeric($_GET["bus_id"])) {
    // Prepare a delete statement
    $sql = "DELETE FROM non_ac WHERE bus_id = ?";

    if($stmt = mysqli_prepare($conn, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_bus_id);

        // Set parameters
        $param_bus_id = $_GET["bus_id"];

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)) {
            // Redirect to admin panel after deleting the bus
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
?>