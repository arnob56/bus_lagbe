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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('background.jpg'); /* Replace 'background.jpg' with the path to your image */
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.8); /* Add opacity to the container */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        h2 {
            margin-top: 0;
            color: #333;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" name="email" placeholder="Email" required>
            <br>
            <input type="password" name="password" placeholder="Password" required>
            <br>
            <input type="submit" value="Login">
        </form>
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
                echo "<p class='error'>Invalid email or password</p>";
            }
        }
        ?>
    </div>
</body>
</html>
