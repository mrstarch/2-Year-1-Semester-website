<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
setcookie("auth", "", time() + 60 * 30, "/", "", 0);
session_destroy();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Logged Out</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <div class="nav"><p></p></div>
        <div class ="content">
            <h1>Logout Successful</h1>
            <fieldset>
                <legend><h2>You Have Been Logged Out</h2></legend>
                <form action="../index.php" method="GET">
                    <p>Thank you for using our site! Come back some time.</p>
                    <input type="submit" value="Return to Login">
                </form>
            </fieldset>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="../main.js"></script>
    </body>
</html>
