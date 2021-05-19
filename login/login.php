<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include "../lib/loginDB.php";

$targetemail = strtolower(filter_input(INPUT_POST, 'email'));
$targetpasswd = filter_input(INPUT_POST, 'password');
// Check for required fields, redirect back to login page if missing.
if (!targetemail || !targetpasswd) {
    header("Location: ../index.html");
    exit;
}

$mysqli = new mysqli($hostDB, $usernameDB, $passwordDB, $databaseDB);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " 
            . $mysqli->connect_error . "\n";
}
$query = "SELECT email, username, password "
       . "FROM Users "
       . "WHERE email = ? AND"
       . "      password = SHA1(?)";
if (!$stmt = $mysqli->prepare($query)) {
    echo "Prepare failed (" . $mysqli->errno . ") " . $mysqli->error . "\n";
}
if (!($stmt->bind_param("ss", $targetemail, $targetpasswd))) {
    echo "Binding parameters failed: (" . $stmt->errno . ") " 
         . $stmt->error . "\n";
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error . "\n";
    header("Location: ../index.html");
    exit;
} else { 
    $res = $stmt->get_result();
    $row = $res->fetch_assoc();
    if (!is_null($row)) {
        session_start();
        setcookie('auth', session_id(), time() + 60 * 30, "/", "", 0);
        $_SESSION["username"] = $row["username"];
        header('Location: ../characters/select.php');
    } else {
        header("Location: ../index.php?invalid=true");
        exit;
    }
}
