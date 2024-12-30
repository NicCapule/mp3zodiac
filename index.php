<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Database credentials
    $host = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $database = 'if0_38009777_zodiac';
    
    // Connect to the database
    $conn = mysqli_connect($host, $db_username, $db_password, $database);
    
    // Check for errors
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    
    // Prevent SQL injection by using prepared statements
    $query = "SELECT * FROM users WHERE email = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row["is_admin"] == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['is_admin'] = 1;  // Add this line
            header('Location: home_admin.php');
            exit();
        } else {
            $_SESSION['username'] = $username;
            header('Location: home_user.php');
            exit();
        }
    } else {
        $login_error = "Invalid username or password.";
    }

    // Close the database connection
    mysqli_close($conn);
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href=".\stylecss.css"> 
    <title>Login Form</title>
</head>
<body class="login_body">
    <section>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div class="container">
            <div class="content">
                <h2>Sign In</h2>
                <?php if(isset($login_error)): ?>
                    <div class="error-message"><?php echo $login_error; ?></div>
                <?php endif; ?>
                <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <div class="inputBox">
                    <input type="text" name="username" placeholder="Email" required>
                    </div>
                    <div class="inputBox">
                        <input type="password" name="password"  placeholder="Password" required>
                    </div>
                    <div class="links">
                        <a href="register.php">Signup User</a>
                        <a href="registerAdmin.php">Signup Admin</a>
                    </div>
                    <div class="inputBox">
                        <input type="submit" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </section>

    
</body>
</html>

