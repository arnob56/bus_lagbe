<?php
// Start session
session_start();


// Check if admin is logged in, if not redirect to login page
/*if(!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true){
    header("location: admin_login.php");
    exit;
}*/


// Include config file
require_once "db.php";


// Define variables and initialize with empty values
$bus_name = $boarding_point = $dropping_point = $fare = $seat = $distance = $travel_time = $number_of_trip = $first_trip = $last_trip = $bus_type = "";
$bus_name_err = $boarding_point_err = $dropping_point_err = $fare_err = $seat_err = $distance_err = $travel_time_err = $number_of_trip_err = $first_trip_err = $last_trip_err = $bus_type_err = "";


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
   

    if(empty(trim($_POST["bus_name"]))){
        $bus_name_err = "Please enter a bus name.";
    } else{
        $bus_name = trim($_POST["bus_name"]);
    }


    if(empty(trim($_POST["boarding_point"]))){
        $boarding_point_err = "Please enter boarding point.";
    } else{
        $boarding_point = trim($_POST["boarding_point"]);
    }


    if(empty(trim($_POST["dropping_point"]))){
        $dropping_point_err = "Please enter dropping point.";
    } else{
        $dropping_point = trim($_POST["dropping_point"]);
    }

    if(empty(trim($_POST["fare"]))){
        $fare_err = "Please enter fare.";
    } else{
        $fare = trim($_POST["fare"]);
    }

    if(empty(trim($_POST["seat"]))){
        $seat_err = "Please enter Total seat.";
    } else{
        $seat = trim($_POST["seat"]);
    }


    if(empty(trim($_POST["distance"]))){
        $distance_err = "Please enter distance";
    } else{
        $distance = trim($_POST["distance"]);
    }

    if(empty(trim($_POST["travel_time"]))){
        $travel_time_err = "Please enter travel_time.";
    } else{
        $travel_time = trim($_POST["travel_time"]);
    }

    if(empty(trim($_POST["number_of_trip"]))){
        $number_of_trip_err = "Please enter number_of_trip.";
    } else{
        $number_of_trip = trim($_POST["number_of_trip"]);
    }

    if(empty(trim($_POST["first_trip"]))){
        $first_trip_err = "Please enter a bus name.";
    } else{
        $first_trip = trim($_POST["first_trip"]);
    }

    if(empty(trim($_POST["last_trip"]))){
        $last_trip_err = "Please enter last_trip.";
    } else{
        $last_trip = trim($_POST["last_trip"]);
    }

    if(empty(trim($_POST["bus_type"]))){
        $bus_type_err = "Please enter a bus type.";
    } else{
        $bus_type = trim($_POST["bus_type"]);
    }

  
    

   
    // Check input errors before updating the database
    if(empty($bus_name_err) && empty($boarding_point_err) && empty($dropping_point_err) && empty($fare_err) &&  empty($seat_err) && empty($distance_err) && empty($travel_time_err) && empty($number_of_trip_err) && empty($first_trip_err) && empty($last_trip_err) && empty($bus_type)){
        // Prepare an update statement
        $sql = "UPDATE non_ac SET bus_name=?, boarding_point=?, dropping_point=?, fare=?, seat=?, distance=?, travel_time=?, number_of_trip=?, first_trip=?, last_trip=?, bus_type=? WHERE bus_id=?";
       
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssssssi", $param_bus_name, $param_boarding_point, $param_dropping_point, $param_fare, $param_seat, $param_distance, $param_travel_time, $param_number_of_trip, $param_first_trip, $param_last_trip, $param_bus_id);
           
            // Set parameters
            $param_bus_name = $bus_name;
            $param_boarding_point = $boarding_point;
            $param_dropping_point = $dropping_point;
            $param_fare = $fare;
            $param_seat = $seat;
            $param_distance = $distance;
            $param_travel_time = $travel_time;
            $param_number_of_trip = $number_of_trip;
            $param_first_trip = $first_trip;
            $param_last_trip = $last_trip;
            $param_bus_type = $bus_type;
            $param_bus_id = $_GET["id"]; // Assuming the bus id is passed via URL
           
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to admin panel after updating the record
                header("location: edit_bus.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
       
        // Close statement
        mysqli_stmt_close($stmt);
    }
   
    // Close connection
    mysqli_close($conn);
} else{
    // Retrieve bus details from database
    $bus_id = $_GET["id"];
    $sql = "SELECT bus_name,boarding_point, dropping_point, fare, seat, distance, travel_time, number_of_trip, first_trip, last_trip, bus_type FROM non_ac WHERE bus_id = ?";
   
    if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_bus_id);
       
        // Set parameters
        $param_bus_id = $bus_id;
       
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
           
            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                // Retrieve existing bus details
                $bus_name = $row["bus_name"];
                $boarding_point = $row["boarding_point"];
                $dropping_point = $row["dropping_point"];
                $fare = $row["fare"];
                $seat = $row["seat"];
                $distance = $row["distance"];
                $travel_time = $row["travel_time"];
                $number_of_trip = $row["number_of_trip"];
                $first_trip = $row["first_trip"];
                $last_trip = $row["last_trip"];
                $bus_type = $row["bus_type"];
                

            } else{
                // Bus id not found, redirect to admin panel
                header("location: edit_bus.php");
                exit();
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
   
    // Close statement
    mysqli_stmt_close($stmt);
   
    // Close connection
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Bus</title>
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Edit Bus</h2>
        <p>Please edit the bus details below.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $_GET["id"]; ?>" method="post">

            <div <?php echo (!empty($bus_name_err)) ? 'has-error' : ''; ?>>
                <label>Bus Name</label>
                <input type="text" name="bus_name" class="form-control" value="<?php echo $bus_name; ?>">
                <span><?php echo $bus_name_err; ?></span>
            </div>

            <div <?php echo (!empty($boarding_point_err)) ? 'has-error' : ''; ?>>
                <label>Boarding Point</label>
                <input type="text" name="boarding_point" class="form-control" value="<?php echo $boarding_point; ?>">
                <span><?php echo $boarding_point_err; ?></span>
            </div>

            <div <?php echo (!empty($dropping_point_err)) ? 'has-error' : ''; ?>>
                <label>Dropping Point</label>
                <input type="text" name="dropping_point" class="form-control" value="<?php echo $dropping_point; ?>">
                <span><?php echo $dropping_point_err; ?></span>
            </div>

            <div <?php echo (!empty($fare_err)) ? 'has-error' : ''; ?>>
                <label>Fare</label>
                <input type="text" name="fare" class="form-control" value="<?php echo $fare; ?>">
                <span><?php echo $fare_err; ?></span>
            </div>

            <div <?php echo (!empty($seat_err)) ? 'has-error' : ''; ?>>
                <label>Distance</label>
                <input type="text" name="seat" class="form-control" value="<?php echo $seat; ?>">
                <span><?php echo $seat_err; ?></span>
            </div>

            <div <?php echo (!empty($distance_err)) ? 'has-error' : ''; ?>>
                <label>Distance</label>
                <input type="text" name="distance" class="form-control" value="<?php echo $distance; ?>">
                <span><?php echo $distance_err; ?></span>
            </div>

            <div <?php echo (!empty($travel_time_err)) ? 'has-error' : ''; ?>>
                <label>Travel Time</label>
                <input type="text" name="travel_time" class="form-control" value="<?php echo $travel_time; ?>">
                <span><?php echo $travel_time_err; ?></span>
            </div>

            <div <?php echo (!empty($number_of_trip_err)) ? 'has-error' : ''; ?>>
                <label>Number of Trip</label>
                <input type="text" name="number_of_trip" class="form-control" value="<?php echo $number_of_trip; ?>">
                <span><?php echo $number_of_trip_err; ?></span>
            </div>

            <div <?php echo (!empty($first_trip_err)) ? 'has-error' : ''; ?>>
                <label>First trip</label>
                <input type="text" name="first_trip" class="form-control" value="<?php echo $first_trip; ?>">
                <span><?php echo $first_trip_err; ?></span>
            </div>



            <div <?php echo (!empty($last_trip_err)) ? 'has-error' : ''; ?>>
                <label>Last Trip</label>
                <input type="text" name="last_trip" class="form-control" value="<?php echo $last_trip; ?>">
                <span><?php echo $last_trip_err; ?></span>
            </div>

            <div <?php echo (!empty($bus_type_err)) ? 'has-error' : ''; ?>>
                <label>Bus type</label>
                <input type="text" name="bus_type" class="form-control" value="<?php echo $bus_type; ?>">
                <span><?php echo $bus_type_err; ?></span>
            </div>


            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a href="admin_panel.php" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>    
</body>
</html>



