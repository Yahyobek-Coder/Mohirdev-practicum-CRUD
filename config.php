<?php

$server = "localhost";
$dbname = "yangiliklar_db";
$username = "root";
$password = "secret";

try {
    $conn = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
    // Set the error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // If an error occurs, print the error message
    echo 'Connection failed: ' . $e->getMessage();
}

?>