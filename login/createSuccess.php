<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$email = filter_input(INPUT_GET, "email");
$username = filter_input(INPUT_GET, "username");
$message = nl2br("Account successfully created!\n\n"
                . "Email: $email\n"
                . "Username: $username");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Account Creation</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <?php include $_SERVER['DOCUMENT_ROOT']."/213Final/lib/navBar.php"; ?>
        <div class ="content">
            <h1>Account Creation</h1>
            <fieldset>
                <legend><h2>New User</h2></legend>
                <p>
                    <?php echo $message; ?>
                </p>
                <button onclick="window.location.href='../index.php'">Proceed to Login</button>
            </fieldset>
        </div>
        <!--import jQuery-->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <!--This is the JS file that will be used on every page-->
        <script src="../main.js"></script>
        <!--Add additional JS files below.-->
    </body>
</html>