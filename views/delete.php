<?php

$servername = "localhost";
$username = "root";
$password = "";
$databasename = "php_crud";

$conn = new mysqli(
    $servername,
    $username,
    $password,
    $databasename
);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    $deleteQuery = "DELETE FROM `users` WHERE id = $id";
// this is just testing for github push 
    if ($conn->query($deleteQuery) === TRUE) {
        echo "Record deleted successfully";
  
    } else {
        
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}

$conn->close();