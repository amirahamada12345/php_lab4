<?php 

include "connection.php";
// include "validation.php";
    if (isset($_POST['update'])) {

        $full_name = $_POST['full_name'];

        $user_id = $_POST['user_id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $email = $_POST['email'];
        $birth_date = $_POST['birth_date'];
        $city = $_POST['city'];
       
         require "validation.php" ;
        $sql = "UPDATE `users` SET `full_name`='$full_name',`username`='$username',`password`='$password',`email`='$email',`birth_date`='$birth_date',`city`='$city' WHERE `id`='$user_id'"; 

        $result = $conn->query($sql); 

        if ($result == TRUE) {

            echo "Record updated successfully.";

        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    } 

if (isset($_GET['id'])) {

    $user_id = $_GET['id']; 

    $sql = "SELECT * FROM `users` WHERE `id`='$user_id'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $full_name = $row['full_name'];

            $username = $row['username'];
            $password  = $row['password'];
            // $password  = $row['confirm_password'];
            $email = $row['email'];

            $birth_date = $row['birth_date'];
            $city = $row['city'];

            $id = $row['id'];

        } 

    ?>

        <h2>User Update Form</h2>

        <form action="" method="post">

          <fieldset>

            <legend>Personal information:</legend>

            Full_name:<br>

            <input type="text" name="full_name" value="<?php echo $full_name; ?>">

            <input type="hidden" name="user_id" value="<?php echo $id; ?>">

            <br>

            name:<br>

            <input type="text" name=" username" value="<?php echo $username; ?>">

            <br>

        
            Password:<br>

            <input type="password" name="password" value="<?php echo $password; ?>">

            <br>
            confirm_password:<br>

            <input type="password" name="confirm_password" value="<?php echo $confirm_password; ?>">

            <br>

            Email:<br>

<input type="text" name="email" value="<?php echo $email; ?>">

<br>

birth_date:<br>

<input type="date" name="birth_date" value="<?php echo $birth_date; ?>">

<br>
           city:<br>

            <select id="city" name="city" >
        <option value="Qena"   <?php if($city == 'Qena'){ echo "checked";} ?> >Qena</option>
        <option value="LUXOR"  <?php if($city == 'LUXOR'){ echo "checked";} ?> >LUXOR</option>
        <option value="Aswan"   <?php if($city == 'Aswan'){ echo "checked";} ?> >Aswan</option>
        <option value="ALEX"   <?php if($city == 'ALEX'){ echo "checked";} ?> >ALEX</option>
    </select>
    <br>
            <br><br>

            <input type="submit" value="Update" name="update">

          </fieldset>

        </form> 

        </body>

        </html> 

    <?php

    } else{ 

        header('Location: view.php');

    } 

}

?>