<?php 

include "connection.php";

$sql = "SELECT * FROM users";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

    <title>View Page</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>

<body>

    <div class="container">

        <h2>users</h2>

<table class="table">

    <thead>

        <tr>

        <th>ID</th>

        <th>full_name</th>
        <th>username</th>
        <th>password</th>
        <th>email</th>
        <th>birth_date</th>
        <th>city</th>

    </tr>

    </thead>

    <tbody> 

        <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                    <td><?php echo $row['id']; ?></td>

                    <td><?php echo $row['full_name']; ?></td>

                    <td><?php echo $row['username']; ?></td>

                    <td><?php echo $row['password']; ?></td>

                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['birth_date']; ?></td>
                    <td><?php echo $row['city']; ?></td>

                  <td><a class="btn btn-info " href="update.php?id=<?php echo $row['id']; ?>"> Edit </a>&nbsp;<a class="btn btn-danger mt-4" href="delete.php?id=<?php echo $row['id']; ?>"> Delete</a></td>

                    </tr>                       

        <?php       }

            }

        ?>                

    </tbody>

</table>

    </div> 

</body>

</html>

