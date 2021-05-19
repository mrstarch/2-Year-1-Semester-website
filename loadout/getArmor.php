<?php

session_start();
include "../lib/loginDB.php";

$mysqli = mysqli_connect($hostDB, $usernameDB, $passwordDB, $databaseDB);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") "
    . $mysqli->connect_error . "\n";
}
$query = "SELECT * FROM Armor WHERE Armor_ID > 0";
if (!$stmt = $mysqli->prepare($query)) {
    echo "Prepare failed (" . $mysqli->errno . ") " . $mysqli->error . "\n";
}
if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error . "\n";
} else {
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $name = $row['Name'];
        $id = $row['Armor_ID'];
        $str = $row['Strength'];
        $agi = $row['Agility'];
        $int = $row['Intelligence'];
        echo "<option value='$id' class='text-field'>$name str: $str agi: $agi int: $int</option>";
    }
}
?>