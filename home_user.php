<?php
session_start();

// Include the file containing the getZodiacSign function
require_once('getZodiacSign.php');

// Check if the user is logged in by checking the session variable 'username'
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

// Fetch user details based on the 'username'
$username = $_SESSION['username'];

// Connect to the database
$host = 'localhost';
$db_username = 'root';
$db_password = '';
$database = 'zodiac';
$conn = mysqli_connect($host, $db_username, $db_password, $database);

// Check for errors
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Prevent SQL injection by using prepared statements
$query = "SELECT * FROM users WHERE email = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Check if the user exists and fetch their data
if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    $zodiac_sign = getZodiacSign($user['birthday']); // Assuming you have the 'getZodiacSign' function
    // Fetch Zodiac details
    $query = "SELECT * FROM zodiac WHERE sign_name = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $zodiac_sign);
    mysqli_stmt_execute($stmt);
    $zodiac_result = mysqli_stmt_get_result($stmt);
    $zodiac_details = mysqli_fetch_assoc($zodiac_result);
} else {
    echo "User not found.";
    exit();
}



mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="stylecss.css">
</head>
<body>
    <section>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    <div class="userpage">
        <h2>User Dashboard</h2>
        <p>Welcome, <?php echo htmlspecialchars($user['first_name']); ?>!</p>

        <h3>Your Daily Horoscope</h3>
        <p>Zodiac Sign: <?php echo htmlspecialchars($zodiac_sign); ?></p>
        <p>Description: <?php echo htmlspecialchars($zodiac_details['description']); ?></p>
        <div class="img">
            <img src="<?php echo htmlspecialchars($zodiac_details['image_url']); ?>" alt="<?php echo htmlspecialchars($zodiac_sign); ?>">
        </div>
        <div class= "links">
            <a href="logout.php">Logout</a>
        </div>
    </div>
    </section>
</body>
</html>
