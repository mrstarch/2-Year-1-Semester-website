<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include "../lib/loginDB.php";
$name = $_SESSION ['character'];
$username = $_SESSION['username'];
$weaponID = filter_input(INPUT_GET, 'weapon');
$armorID = filter_input(INPUT_GET, 'armor');
$mysqli = mysqli_connect($hostDB, $usernameDB, $passwordDB, $databaseDB);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") "
    . $mysqli->connect_error . "\n";
}
$query = "UPDATE Characters "
        . "SET Armor_ID = ?, Weapon_ID = ? "
        . "WHERE Username = ? AND "
        . "      Name = ?";
if (!$stmt = $mysqli->prepare($query)) {
    echo "Prepare failed (" . $mysqli->errno . ") " . $mysqli->error . "\n";
}
if (!($stmt->bind_param("iiss", $armorID, $weaponID, $username, $name))) {
    echo "Binding parameters failed: (" . $stmt->errno . ") "
    . $stmt->error . "\n";
}
if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error . "\n";
}