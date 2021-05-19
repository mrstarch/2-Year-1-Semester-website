<?php

session_start();
include "../lib/loginDB.php";
$targetuser = $_SESSION["username"];

$mysqli = mysqli_connect($hostDB, $usernameDB, $passwordDB, $databaseDB);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") "
    . $mysqli->connect_error . "\n";
}
$query = "SELECT Name FROM Characters WHERE username= ?";
if (!$stmt = $mysqli->prepare($query)) {
    echo "Prepare failed (" . $mysqli->errno . ") " . $mysqli->error . "\n";
}
if (!($stmt->bind_param("s", $targetuser))) {
    echo "Binding parameters failed: (" . $stmt->errno . ") "
    . $stmt->error . "\n";
}
if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error . "\n";
} else {
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $name = $row['Name'];
        echo "<option value='$name' class='text-field'>$name</option>";
    }
}
?>