<?php
if(
isset($_POST['full_name'])
&&isset($_POST['username'])
&&isset($_POST['password'])
&&isset($_POST['confirm_password'])
&&isset($_POST['email'])
&&isset($_POST['birth_date'])
&&isset($_POST['city'])
)
{
    $full_name=$_POST['full_name'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $password2=$_POST['confirm_password'];
    $email=$_POST['email'];
    $birth_date=$_POST['birth_date'];
    $city=$_POST['city'];


    $pattern='/([A-Z])+|\/+/';
    $pattern2='/([A-Z])+|(\s)+|\/+/';
     ////////////////////////////////////

    if(!empty($full_name)&&!empty($username)&&!empty($password)&&!empty($password2)
        &&!empty($email)&&!empty($birth_date)&&!empty($city) ) // all fields not empty
    {
        $validMail = filter_var($email,FILTER_VALIDATE_EMAIL);
        if ( $password==$password2 && $validMail &&!preg_match($pattern,$full_name)
            && !preg_match($pattern2,$username) )
        {
            $encryptPassword=password_hash($password,PASSWORD_DEFAULT); //encrypt pass
//            //method 1
include "connection.php";
        //    require "connection.php";
        //    $query=$conn->query("INSERT INTO users (full_name , username ,email, birth_date , city , password) VALUES ( ".$full_name . "  , " .$username . "  , " .$email. "  , " . $birth_date . "  , " . $city . "  , " . $encryptPassword." )");
        //    echo ("INSERT INTO users (full_name , username ,email, birth_date , city , password)VALUES(?,?,?,?,?,?)");
        //    $query->execute();
        $sql = "INSERT INTO `users`(`full_name`, `username`, `password`, `email`, `birth_date`,`city`) VALUES ('$full_name','$username','$encryptPassword','$email','$birth_date','$city')";
   
// echo $sql;
        $result = $conn->query($sql);
    
        if ($result == TRUE) {
    
          echo "New record created successfully.";
    
        }else{
    
          echo "Error:". $sql . "<br>". $conn->error;
    
        } 
    
        $conn->close(); 
            //method 2
            // $columns=['full_name'=>$full_name ,  'username'=> $username,'email'=>$email , 'birth_date'=>$birth_date , 'city'=>$city , 'password'=>$encryptPassword];

            // require "db-class.php";
            // $myDB = new Database();
            // $myDB->connect();
            // $myDB->insert( "users" ,$columns );

            // header("Location:view.php"); //redirect users page to show table of users

        }

        else {
            if($password!=$password2){
                echo '<div class="alert alert-danger">'."entered passwords not the same"."</div>";
            }
            if(!$validMail){
                echo '<div class="alert alert-danger">'."this is invalid email "."</div>";
            }

            if(preg_match($pattern,$full_name)){
                echo '<div class="alert alert-danger">'."please don't use (UpperCASE,space,/) in full name."."</div>";
            }
            if(preg_match($pattern2,$username)){
                echo '<div class="alert alert-danger">'."please don't use (UpperCASE,space,/) in username"."</div>";
            }
        }

    }
    else {
        echo '<div class="alert alert-danger">'."you entered empty values!"."</div>";
    }
}

?>