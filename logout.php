<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logging Out</title>
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
        <div class="logout_container">
            <h1>Logging Out</h1>
            <p>Thank you for using our service</p>
            <div class="loader"></div>
        </div>
    </section>
    <?php
        header('Refresh: 3; URL = index.php');
    ?>
</body>
</html>