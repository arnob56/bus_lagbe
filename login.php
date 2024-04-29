<?php
include_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Passenger WHERE Email='$email' AND Password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        session_start();
        $_SESSION['email'] = $email; // session variable
        header("Location: result.php");
      //search page
        exit();
    } else {
        echo "Invalid email or password";
    }
}
?>
