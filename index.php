<!DOCTYPE html>
<!--
Mitchell Vivian 300202471
Daniel Strauch 
-->
<?php
$message = "";
$invalidLogin = filter_input(INPUT_GET, 'invalid');
if ($invalidLogin) {
    $message = "Email/password combination not found.\nPlease try again or make a new account.";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="nav"><p></p></div>
        <div class ="content">
            <h1>Create-A-Character</h1>
            <fieldset>
                <legend><h2>Login</h2></legend>
                <form action="login/login.php" method="POST">
                    <label for="email">Email:</label>
                    <br>
                    <input class="text-field" type="email" name="email" id="email" required>
                    <br><br>
                    <label for="password">Password:</label>
                    <br>
                    <input class="text-field" type="password" name="password" id="password" required>
                    <br><div class="error-text"><?php echo nl2br($message); ?></div><br>
                    <input type="submit" value="Submit">
                </form>
            </fieldset>
            <br>
            <a href="login/createAccount.html">Create Account</a>
        </div>
        <!--import jQuery-->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <!--This is the JS file that will be used on every page-->
        <script src="main.js"></script>
        <!--Add additional JS files below.-->
        <script src="index.js"></script>
    </body>
</html>
