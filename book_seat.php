<?php
session_start();
include_once 'db.php';

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: index.html"); // Redirect to login page if not logged in
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $passenger_name = $_POST['passenger_name'];
    $phone = $_POST['phone'];
    $boarding_point = $_POST['boarding_point'];
    $dropping_point = $_POST['dropping_point'];
    $bus_name = $_POST['bus_name'];
    $bus_type = $_POST['bus_type'];
    $seats = $_POST['seats']; // Array of selected seats
    $fare = $_POST['fare'];

    $boarding_pointa = $_GET['boarding_point'] ?? '';

    echo $boarding_pointa ,"  " , $dropping_point,"  ";


    // Create an empty array
    $seatList = array();

    foreach ($seats as $string) {
        echo $string . "--";
        $seatList= array_merge($seatList, explode(",", $string));
    }
    
    // Calculate total fare
    $total_fare = (int)$fare * count($seatList);


    
    echo count($seatList),"**";
    //$seatsList=explode(',', $seats)

   

    // Generate random PNRs for each seat booked
    $pnr = array();
    foreach ($seats as $seat) {
    

                // Generate unique PNR
        do {
            $pnr_candidate = mt_rand(100000, 999999);
            $sql_check_pnr = "SELECT * FROM tickets WHERE PNR = '$pnr_candidate'";
            $result_check_pnr = $conn->query($sql_check_pnr);
        } while ($result_check_pnr->num_rows > 0);

        $pnr[] = $pnr_candidate;

        // Get the current time
        $time = date("Y-m-d H:i:s");

        // Insert booking details into the database
        $sql = "INSERT INTO tickets (Passenger_Name, Phone, Boarding_Point, Dropping_Point, Bus_Name, Seat, PNR, Time) 
                VALUES ('$passenger_name', '$phone', '$boarding_point', '$dropping_point', '$bus_name', '$seat', '$pnr_candidate', '$time')";
        if ($conn->query($sql) !== TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    echo "Booking successful! Your PNRs are: " . implode(', ', $pnr) . ". Total Fare: " . $total_fare;

    echo "<a href= 'ticket_details.php?pnr=$pnr_candidate'>Get your ticket</a>" ;
    echo "<a href= 'submit_review.php?pnr=$pnr_candidate'>Submit Review</a>" ;
}

// Fetch fare based on the selected bus name
if(isset($_GET['bus_name'])) {
    $bus_name = $_GET['bus_name'];
    $sql = "SELECT Fare FROM non_ac WHERE Bus_Name = '$bus_name'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fare = $row['Fare'];
    } else {
        $fare = "Error: Fare not found";
    }
} 
?>




    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Book Seat</title>
<style>
    body {
        font-family: Arial, sans-serif;
    }

    .container {
        width: 80%;
        margin: auto;
        text-align: center;
    }

    input[type="text"],
    input[type="submit"] {
        padding: 10px;
        margin: 5px 0;
        width: calc(100% - 20px); /* Adjust the width as needed */
        box-sizing: border-box;
    }

    .seat-container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }

    .seat {
        width: 40px;
        height: 40px;
        background-color: #ccc;
        border: 1px solid #aaa;
        margin: 5px;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: bold;
        font-size: 16px;
    }

    .seat.selected {
        background-color: blue;
        color: white;
    }

    .seat.booked {
        background-color: red;
        color: white;
    }

    h2 {
        margin-bottom: 20px;
    }

    form {
        margin-top: 20px;
    }

    input[type="submit"] {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin-top: 10px;
        cursor: pointer;
        border-radius: 5px;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
    </head>



        <body>
            <div class="container">
                <h2>Book Seat</h2>
                <!-- Display fare and provide form for booking -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="text" name="passenger_name" placeholder="Passenger Name" required><br>
                    <input type="text" name="phone" placeholder="Phone" required><br>
                    <input type="text" name="boarding_point" value="<?php if(isset($_GET['boarding_point'])) echo $_GET['boarding_point']; ?>"><br>
                    <input type="text" name="dropping_point" value="<?php if(isset($_GET['dropping_point'])) echo $_GET['dropping_point']; ?>"><br>
                    <input type="text" name="bus_name" value="<?php if(isset($_GET['bus_name'])) echo $_GET['bus_name']; ?>"><br>
                    <input type="text" name="bus_type" value="<?php if(isset($_GET['bus_type'])) echo $_GET['bus_type']; ?>">
                    
                    <div class="seat-container">
                        <h3>Select Seat(s)</h3>
                        <?php
                        // Generate seat options
                        $rows = 10; // Number of rows
                        $cols = 4; // Number of columns
                        for ($row = 0; $row < $rows; $row++) {
                            for ($col = 1; $col <= $cols; $col++) {
                                $seat_number = chr(65 + $row) . $col; // Convert ASCII to character (A, B, C, ...)
                                // Check if the seat is booked from the database
                                $sql = "SELECT * FROM tickets WHERE Bus_Name = '$bus_name' AND Seat = '$seat_number'";
                                $result = $conn->query($sql);
                                $booked = ($result && $result->num_rows > 0) ? true : false;

                                // Visualize the seat based on its availability
                                $class = ($booked) ? 'seat booked' : 'seat';
                                echo "<div class='$class' data-seat='$seat_number'>$seat_number</div>";
                            }
                        }
                        ?>
                    </div>
                    <input type="text" name="seats[]" id="selected-seats" value="">
                    
                    <!-- Display fare automatically retrieved based on selected bus -->
                    <input type="text" name="fare" value="<?php echo $fare; ?>" readonly><br>
                    <input type="submit" value="Book">
                </form>
            </div>

       */script>
            // JavaScript to handle seat selection
            document.addEventListener('DOMContentLoaded', function() {
                const seats = document.querySelectorAll('.seat');
                const selectedSeatsInput = document.getElementById('selected-seats');

                seats.forEach(seat => {
                    seat.addEventListener('click', function() {
                        if (!this.classList.contains('booked')) {
                            this.classList.toggle('selected');
                            updateSelectedSeats();
                        }
                    });
                });

                function updateSelectedSeats() {
                    const selectedSeats = [];
                    seats.forEach(seat => {
                        if (seat.classList.contains('selected')) {
                            selectedSeats.push(seat.getAttribute('data-seat'));
                        }
                    });
                    selectedSeatsInput.value = selectedSeats.join(',');
                }
            });


            <script>
               document.addEventListener('DOMContentLoaded', function() {
                const seats = document.querySelectorAll('.seat');
                const selectedSeatsInput = document.getElementById('selected-seats');

                seats.forEach(seat => {
                    seat.addEventListener('click', function() {
                        if (!this.classList.contains('booked')) {
                // If the seat is not booked, toggle the 'selected' class
                            this.classList.toggle('selected');
                            updateSelectedSeats();
                        } else {
                // If the seat is already booked, do not toggle the 'selected' class
                            alert('This seat is already booked.');
                        }
                    });
                });

                function updateSelectedSeats() {
                    const selectedSeats = [];
                    seats.forEach(seat => {
                        if (seat.classList.contains('selected')) {
                            selectedSeats.push(seat.getAttribute('data-seat'));
                        }
                    });
                    selectedSeatsInput.value = selectedSeats.join(',');
                }
            });
            </script>


}
?>



</body>
</html>
