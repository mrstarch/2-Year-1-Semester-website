<?php
/*
 * TODO: back button upon account creation
 */


$targetemail = strtolower(filter_input(INPUT_POST, 'email'));
$targetusername = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

if ($targetemail) {
    include "../lib/loginDB.php";
    
    $mysqli = new mysqli($hostDB, $usernameDB, $passwordDB, $databaseDB);

    $message = "";
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " 
                . $mysqli->connect_error . "\n";
    }
    $query = "INSERT INTO Users VALUES("
            . "?, SHA1(?), ?)";
    if (!$stmt = $mysqli->prepare($query)) {
        echo "Prepare failed (" . $mysqli->errno . ") " . $mysqli->error . "\n";
    }
    if (!($stmt->bind_param("sss", $targetusername, $password, $targetemail))) {
        echo  "Binding parameters failed: (" . $stmt->errno . ") " 
             . $stmt->error . "\n";
    }
    if (!$stmt->execute()) {    
        if ($stmt->errno === 1062) {
            echo "This username or email is already taken.";
        } else {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error . "\n";
        }
        exit;
    } else {
        http_response_code(303);
        header("Status: 303");
        header("Redirect: createSuccess.php?email=$targetemail&username=$targetusername");
        exit;
    }
}
