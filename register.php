<?php
include_once("config.php");
include_once("getZodiacSign.php"); // Include the zodiac sign function

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $birthday = $_POST["birthday"];
    $gender = $_POST["gender"];

    // Determine the zodiac sign using the function from getzodiacsign.php
    $zodiac_sign = getZodiacSign($birthday);

    // Insert the user into the database
    $sql = "INSERT INTO users (username, first_name, last_name, password, email, birthday, gender, zodiac_sign) VALUES ('$username', '$firstname', '$lastname', '$password', '$email', '$birthday', '$gender', '$zodiac_sign')";
    if (mysqli_query($conn, $sql)) {
        $success_message = "Registration successful!";
        header('Refresh: 2; URL = index.php');
    } else {
        $error_message = "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
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
        <div class="registration">
            <form method="post" action="">
                <h1>User Registration Form</h1>

                <?php if(isset($success_message)): ?>
                    <div class="success-message"><?php echo $success_message; ?></div>
                <?php endif; ?>
                <?php if(isset($error_message)): ?>
                    <div class="error-message"><?php echo $error_message; ?></div>
                <?php endif; ?>

                <?php if(isset($error_message)): ?>
                    <div class="error"><?php echo $error_message; ?></div>
                <?php endif; ?>

                <div class="form-element">
                    <input type="text" placeholder="Username" name="username" required>
                </div>

                <div class="form-element">
                    <input type="text" placeholder="First Name"name="firstname" required>
                </div>

                <div class="form-element">
                    <input type="text" placeholder="Last Name"name="lastname" required>
                </div>
                    

                <div class="radio">
                <h3> Gender </h3> 

                <input type="radio" id="fem" name="gender" value="Female" checked>
                    <label for="fem">Female</label>

                    <input type="radio" id="male" name="gender" value="Male">
                    <label for="male">Male</label>

                    <input type="radio" id="undisclosed" name="gender" value="Undisclosed">
                    <label for="undisclosed">Undisclosed</label> 
                </div>

                <div class="form-element">
                    <input type="date" id="birthday" name="birthday"> 
                </div>

                <div class="form-element">
                    <input type="password" placeholder="Password" name="password" required>
                </div>

                <div class="form-element">
                    <input type="email" placeholder="Email Address" name="email" required>
                </div>

                <div class="links">
                        <a href="index.php">Already have an account?</a>
                    </div>

                <div class="form-element">
                    <input type="submit" name="submit" value="Submit">
                </div>
            </form>
        </div>
    </section>
</body>
</html>