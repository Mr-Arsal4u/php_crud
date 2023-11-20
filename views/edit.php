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
    $selectQuery = "SELECT * FROM `users` WHERE id = $id";
    $result = $conn->query($selectQuery);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "Record not found";
    }
} else {
    echo "Invalid request.";
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
    body {
        background-color: #f8f9fa;
    }

    .container {
        margin-top: 50px;
    }

    form {
        max-width: 400px;
        margin: 0 auto;
    }
    </style>
</head>

<body>

    <div class="container">
        <h2>Edit User</h2>

        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                    value="<?php echo $row['email']; ?>" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="name"
                    value="<?php echo $row['name']; ?>" placeholder="Your name">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>