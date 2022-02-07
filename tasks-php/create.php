


 <!DOCTYPE html>

<html>
  <head>

     <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- <style>
.error {color: #FF0000;}
</style> -->
  </head>


<body>

<!-- <h2>Signup Form</h2> -->

<form action="" method="POST" class="m-5">
<?php require("validation.php"); ?>
  <fieldset>

    <legend>Personal information:</legend>

    full_name:<br>

    <input type="text" name="full_name">

    <br>

    name:<br>

    <input type="text" name="username">

    <br>

    password:<br>

    <input type="password" name="password">

    <br>

    confirm_password:<br>

    <input type="password" name="confirm_password">

    <br>

    email:<br>

<input type="text" name="email">

<br>



birth_date:<br>

<input type="date" name="birth_date">

<br>

    city:<br>

    <select id="city" name="city" >
        <option value="Qena">Qena</option>
        <option value="LUXOR">LUXOR</option>
        <option value="Aswan">Aswan</option>
        <option value="ALEX">ALEX</option>
    </select>
    <br>
    <input type="submit" name="submit" value="submit">
    <br>
  </fieldset>

</form>

</body>

</html> 
 