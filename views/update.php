<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "php_crud";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $name = mysqli_real_escape_string($conn, $_POST["name"]);

    $sql = "UPDATE users SET email='$email', name='$name' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();