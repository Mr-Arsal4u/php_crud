<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h2>User List</h2>

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

        
        $query = "SELECT * FROM `users`;";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            echo "<table class='table table-bordered mt-3'>";
            echo "<thead class='thead-dark'>
                    <tr>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>";
            echo "<tbody>";

            
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row["email"]}</td>";
                echo "<td>{$row["name"]}</td>";
                echo "<td>
                        <a href='views/edit.php?id={$row["id"]}' class='btn btn-primary btn-sm me-2'>Edit</a>
                        <a href='views/delete.php?id={$row["id"]}' class='btn btn-danger btn-sm'>Delete</a>
                    </td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p class='text-muted'>0 results</p>";
        }

        $conn->close();
        ?>

        <a href="views/create.php" class="btn btn-success mt-3">Create</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>