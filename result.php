<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Bus</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Search Bus</h2>
        <form action="search.php" method="get">
            <input type="text" name="bus_name" placeholder="Bus Name"><br>

            <input type="text" name="boarding_point" placeholder="Boarding Point" required><br>
            <input type="text" name="dropping_point" placeholder="Dropping Point" required><br>
            <input type="text" name="bus_type" placeholder="Bus Type" required><br>
            <input type="date" name="date_of_journey" placeholder="Date of Journey" required><br>
            <input type="date" name="return_date" placeholder="Return Date (Optional)"><br>
            <input type="submit" value="Search">
        </form>
    </div>
</body>
</html>