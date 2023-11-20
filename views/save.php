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
    $email = mysqli_real_escape_string($conn, $_POST["exampleInputEmail1"]);
    $name = mysqli_real_escape_string($conn, $_POST["exampleInputPassword1"]);
    $sql = "INSERT INTO users (email, name) VALUES ('$email', '$name')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../index.php");
        exit();
    } else {
      
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>