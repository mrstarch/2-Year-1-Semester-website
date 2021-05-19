<!DOCTYPE html>
<!--
Basic outline for HTML pages
-->
<?php
session_start();
if (!filter_input(INPUT_COOKIE, 'auth') == session_id()) {
    header("Location: ../index.php");
    exit;
}
$_SESSION ['character'] = filter_input(INPUT_POST, 'exisChar');
$character = filter_input(INPUT_POST, 'exisChar');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Loadout</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body onload="getWeapons(); getArmor(); getChar(); listener(); return false">
        <?php include $_SERVER['DOCUMENT_ROOT']."/213Final/lib/navBar.php"; ?>
        <div class ="content">
            <!--all other content and divs go here-->
            <?php echo "<h1>Create a Loadout for $character</h1>"; ?>
            <div class="loadout-creation">
                <fieldset>
                    <legend><h2>Loadout</h2></legend>
                    <h3><?php echo $character; ?> Base Stats:</h3>
                    <div id="stats"></div>

                    <form method="POST" action="">
                        <p>
                            <label for='weapons'>Weapon: </label>
                            <select name="weapons" id="weapons" class="text-field">
                            </select>
                        </p>
                        <p>
                            <label for='armor'>Armor: </label>
                            <select name="armor" id="armor" class="text-field">
                            </select>     
                        </p>
                    </form>
                    <div id="error-text" class="error-text"></div>
                    <div id="total-stats" class="total-stats"></div>
                </fieldset>
            </div> <!--loadout-creation-->
        </div>
        <!--import jQuery-->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <!--This is the JS file that will be used on every page-->
        <script src="../main.js"></script>
        <!--Add additional JS files below.-->
        <script src="loadout_ajax.js"></script>
    </body>
</html>
