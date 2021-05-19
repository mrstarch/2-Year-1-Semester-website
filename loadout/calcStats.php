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
$mysqli = mysqli_connect($hostDB, $usernameDB, $passwordDB, $databaseDB);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") "
    . $mysqli->connect_error . "\n";
}
$query = "SELECT c.Strength + IFNULL(a.Strength, 0) + IFNULL(w.Strength, 0) str,
                 c.Agility + IFNULL(a.Agility, 0) + IFNULL(w.Agility, 0) agi,
                 c.Intelligence + IFNULL(a.Intelligence, 0) + IFNULL(w.Intelligence, 0) intel
                 FROM Characters c
                 INNER JOIN Armor a
                         ON c.Armor_ID = a.Armor_ID
                 INNER JOIN Weapons w
                         ON c.Weapon_ID = w.Weapon_ID
                 WHERE c.Username = ? AND
                       c.Name = ?;";
if (!$stmt = $mysqli->prepare($query)) {
    echo "Prepare failed (" . $mysqli->errno . ") " . $mysqli->error . "\n";
}
if (!($stmt->bind_param("ss", $username, $name))) {
    echo "Binding parameters failed: (" . $stmt->errno . ") "
    . $stmt->error . "\n";
}
if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error . "\n";
}
else {
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $str = $row['str'];
    $agi = $row['agi'];
    $intel = $row['intel'];
    echo nl2br("<h3>Total Loadout Stats:</h3>Strength: $str\nAgility: $agi\nIntelligence: $intel");
    ?>

<?php
}