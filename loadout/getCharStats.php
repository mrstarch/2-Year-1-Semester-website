<?php

session_start();
include "../lib/loginDB.php";
$name = $_SESSION ['character'];
$mysqli = mysqli_connect($hostDB, $usernameDB, $passwordDB, $databaseDB);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") "
    . $mysqli->connect_error . "\n";
}
$query = "SELECT * FROM Characters WHERE Name = ?";
if (!$stmt = $mysqli->prepare($query)) {
    echo "Prepare failed (" . $mysqli->errno . ") " . $mysqli->error . "\n";
}
if (!($stmt->bind_param("s", $name))) {
    echo "Binding parameters failed: (" . $stmt->errno . ") "
    . $stmt->error . "\n";
}
if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error . "\n";
} else {
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $str = $row['Strength'];
        $agi = $row['Agility'];
        $int = $row['Intelligence'];
        echo "Strength: " .$str ."<br>";
        echo "Agility: " .$agi ."<br>";
        echo "Intelligence: " .$int;
    }
}
?>