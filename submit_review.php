<?php
// Start session
session_start();

// Include config file
require_once "db.php";

// Define variables and initialize with empty values
$name = $email = $rating = $review = "";
$name_err = $email_err = $rating_err = $review_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate name
    if (empty(trim($_POST["name"]))) {
        $name_err = "Please enter your name.";
    } else {
        $name = trim($_POST["name"]);
    }

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email address.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate rating
    if (empty(trim($_POST["rating"]))) {
        $rating_err = "Please select a rating.";
    } else {
        $rating = trim($_POST["rating"]);
    }

    // Validate review
    if (empty(trim($_POST["review"]))) {
        $review_err = "Please enter your review.";
    } else {
        $review = trim($_POST["review"]);
    }

    // Check input errors before inserting into database
    if (empty($name_err) && empty($email_err) && empty($rating_err) && empty($review_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO reviews (pnr, name, email, rating, review, time) VALUES (?, ?, ?, ?, ?, NOW())";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "isiss", $param_pnr, $param_name, $param_email, $param_rating, $param_review);

            // Set parameters
            $param_pnr = $_POST['pnr'];
            $param_name = $name;
            $param_email = $email;
            $param_rating = $rating;
            $param_review = $review;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to success page
                header("location: login.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Review</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        form {
            display: flex;
            flex-direction: column;
            margin-top: 20px;
        }
        label {
            font-size: 1.2rem;
            margin-bottom: 5px;
        }
        select,
        textarea {
            padding: 10px;
            font-size: 1.2rem;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
<h2>Submit Review</h2>
        <form id="review-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="pnr" value="<?php echo $_GET['pnr_candidate']; ?>">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required><br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required><br>
            <label for="rating">Rating:</label>
            <select name="rating" id="rating" required>
                <option value="">Select rating</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select><br>
            <label for="review">Review:</label>
            <textarea name="review" id="review" rows="4" cols="50" required></textarea><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
